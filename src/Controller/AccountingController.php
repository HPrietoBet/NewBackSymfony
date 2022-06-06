<?php

namespace App\Controller;

use App\Entity\Main\FacturacionConsolidada;
use App\Entity\Main\FacturacionEstados;
use App\Service\FileUploader;
use Doctrine\Persistence\ManagerRegistry;
use MongoDB\Driver\Manager;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AccountingController extends AbstractController
{
    const FACTURAS_FOLDER = 'facturas';

    private $version;
    private $user;
    private $lang;
    public $em;
    private $userToken;
    private $serializer;

    protected $tokenStorage;

    public function __construct($lang = 'en',  ManagerRegistry $doctrine, TokenStorageInterface $tokenStorage) {
        $this->lang = $lang;
        $this->em = $doctrine;
        if(!empty($tokenStorage->getToken())){
            $this->userToken = $tokenStorage->getToken();
            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $this->user = $this->userToken->getUser();
            $this->serializer = new Serializer($normalizers, $encoders);
        }
    }

    /**
     * @Route("/accounting", name="app_accounting")
     */
    public function index(): Response
    {
        if(empty($this->userToken)){
            return $this->redirect('/login');
        }

        $alerts = $this->getAlerts(10);

        $filterform = $this->createFormBuilder()
            ->add('users', ChoiceType::class, array('choices' => $this->getYears(), 'attr' => array('class' => 'form-control'), 'label' => 'Select Year', "mapped" => false))
            ->getForm();

        $status= $this->getStatus();
        $request = new Request();
        $accounting = $this->getAccounting(date('Y'), date('m'));

        return $this->render('accounting/index.html.twig',
            [
                'title' => 'Accounting',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'months' => $this->getMonths(),
                'current_month' => (int)date('m'),
                'years' => $this->getYears(),
                'current_year' => date('Y'),
                'form' => $filterform->createView(),
                'accounting' => addslashes(json_encode($accounting)),
                'status' => json_encode($status)
            ]
        );
    }

    public function getAccounting($year  ,$month){
        $accounting = $this->serializer->normalize($this->em->getRepository(FacturacionConsolidada::class)->findBy(['year'=>$year, 'month'=>$month]));
        return $accounting;
    }

    public function getStatus(){
        return $this->serializer->normalize($this->em->getRepository(FacturacionEstados::class)->findAll());
    }

    /**
     * @Route("/accounting/get", name="app_accounting_get")
     */
    public function getAjaxAccounting(Request  $request): Response{
        $year = $request->request->get('year');
        $month = $request->request->get('month');
        return $this->json($this->getAccounting($year, $month));
    }




    /**
     * @Route("/accounting/save", name="app_accounting_save")
     */
    public function save(Request $request, ManagerRegistry $doctrine): Response{

        $newData = $request->request->get('newData');
        $oldData = $request->request->get('oldData');
        $id = $request->request->get('id');

        $accObj = $this->em->getRepository(FacturacionConsolidada::class)->find($id);

        if(!empty($accObj)){

            if(isset($newData["cobrado"])){
                $cobrado = ($newData["cobrado"]) == 'true' ? true: false;
                $accObj->setCobrado($cobrado);
            }

            if(isset($newData["comBet"])){
                $accObj->setComBet($newData['comBet']);
            }

            if(isset($newData["comCpa"])){
                $accObj->setComCpa($newData['comCpa']);
            }

            if(isset($newData["comFf"])){
                $accObj->setComFf($newData['comFf']);
            }

            if(isset($newData["comRs"])){
                $accObj->setComRs($newData['comRs']);
            }

            if(isset($newData["comentarios"])){
                $accObj->setComentarios($newData['comentarios']);
            }

            if(isset($newData["currency"])){
                $accObj->setCurrency($newData['currency']);
            }

            if(isset($newData["datosFacturacion"])){
                $accObj->setDatosFacturacion($newData['datosFacturacion']);
            }

            if(isset($newData["estado"])){
                $accObj->setEstado($newData['estado']);
            }

            if(isset($newData["factura"])){
                $accObj->setFactura(str_replace('"', '', $newData['factura']));
            }

            if(isset($newData["fechaCobro"])){

                $fecha = date('Y-m-d', strtotime($newData["fechaCobro"]));
                $accObj->setFechaCobro($fecha);
            }

            if(isset($newData["impuestos"])){
                $accObj->setImpuestos($newData['impuestos']);
            }

            if(isset($newData["requiereFactura"])){
                $accObj->setRequiereFactura($newData['requiereFactura']);
            }

            $comBookie = $accObj->getComCpa() + $accObj->getComRs() + $accObj->getComFf();
            $accObj->setComBookie($comBookie);

            $impuestos = $accObj->getImpuestos();
            $comTotal = $comBookie * (1 + ( $impuestos / 100));
            $accObj->setComTotal($comTotal);

            $comBet = $accObj->getComBet() ?? 0;
            $accObj->setBalance(($comBookie - $comBet));

            $margen = $accObj->getBalance() /$accObj->getComBookie();
            $accObj->setMargenBeneficio($margen);

            $today = date('Y-m-d H:i:s');
            $accObj->setModify($today);

            $doctrine->getManager()->persist($accObj);
            $doctrine->getManager()->flush();

        }


        return $this->json(array('success'=>1, 'msg'=>'Data saved'));
    }

    /**
     * @Route("/accounting/upload", name="app_accounting_upload")
     */
    public function upload( FileUploader $file, ManagerRegistry $doctrine, Request $request):Response
    {

        if(isset($request->files->get('files')[0])){
            $uploadedFile = $request->files->get('files')[0];
            $facturas = $file->upload($uploadedFile, self::FACTURAS_FOLDER);
        }
        return $this->json($facturas);
    }



}
