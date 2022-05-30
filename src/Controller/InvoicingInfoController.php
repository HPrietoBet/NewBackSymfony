<?php

namespace App\Controller;

use App\Entity\Main\FacturacionDatos;
use App\Entity\Main\LoginBusiness;
use App\Entity\Main\MetodosPagos;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use function Sodium\add;

class InvoicingInfoController extends AbstractController
{
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
        if(empty($tokenStorage->getToken())){
            return $this->redirect('/login');
            die();
        }
        $this->userToken = $tokenStorage->getToken();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->user = $this->userToken->getUser();
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/invoicing/info", name="app_invoicing_info")
     */
    public function index(): Response
    {

        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }

        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        return $this->render('invoicing_info/index.html.twig',
            [
                'title' => 'Invoicing Info',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'invoicinginfo' => addslashes(json_encode($this->getInvoicingInfo())),
                'countries' => addslashes(json_encode($this->getCountriesName()))
            ]
        );
    }

    public function getInvoicingInfo(){

        $data = ($this->serializer->normalize($this->em->getRepository(FacturacionDatos::class)->findAll()));
        return $data;
    }

    /**
     * @Route("/invoicing/info/save", name="app_invoicing_info_save")
     */

    public function save(ManagerRegistry $doctrine, Request $request): Response{

        $newData = $request->get('newData');
        $id = $request->get('id');

        $invObj = $doctrine->getRepository(FacturacionDatos::class)->find($id);

        if(isset($newData["tipo"])){
            $invObj->setTipo($newData["tipo"]);
        }

        if(isset($newData["nombre"])){
            $invObj->setNombre($newData["nombre"]);
        }

        if(isset($newData["nombreEmpresa"])){
            $invObj->setNombreEmpresa($newData["nombreEmpresa"]);
        }

        if(isset($newData["nif"])){
            $invObj->setNif($newData["nif"]);
        }

        if(isset($newData["email"])){
            $invObj->setEmail($newData["email"]);
        }

        if(isset($newData["telefono"])){
            $invObj->setTelefono($newData["telefono"]);
        }

        if(isset($newData["control"])){
            $invObj->setControl($newData["control"]);
        }

        if(isset($newData["direccion"])){
            $invObj->setDireccion($newData["direccion"]);
        }

        if(isset($newData["cpostal"])){
            $invObj->setCpostal($newData["cpostal"]);
        }

        if(isset($newData["poblacion"])){
            $invObj->setPoblacion($newData["poblacion"]);
        }

        if(isset($newData["provincia"])){
            $invObj->setProvincia($newData["provincia"]);
        }

        if(isset($newData["pais"])){
            $invObj->setPais($newData["pais"]);
        }

        if(isset($newData["fechaCaducidad"])){
            $invObj->setFechaCaducidad($newData["fechaCaducidad"]);
        }

        $doctrine->getManager()->persist($invObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=>1, 'msg'=>'Invoicing info saved'));
    }

    /**
     * @Route("/invoicing/payments", name="app_invoicing_payments")
     */
    public function payments(): Response
    {

        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }

        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);
        $payments = $this->getPaymentPerUser();

        return $this->render('invoicing_info/index_payments.html.twig',
            [
                'title' => 'Payments Info',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'infopayments' => addslashes(json_encode($payments)),
                'countries' => addslashes(json_encode($this->getCountriesName()))
            ]
        );
    }

    public function getPaymentPerUser(){
        $users = $this->getInvoicingInfo();
        $payments = $this->serializer->normalize($this->em->getRepository(MetodosPagos::class)->findAll());

        $payment_types = array();
        foreach($payments as $payment){
            $payment_types[$payment['idPago']] =$payment['titulopago'];
        }
        $users_payments_returned = array();
        foreach($users as $user){

            $users_payments_returned[] = array('id'=> $user['idUsuFac'], 'email' => $user['email'], 'nombre' => empty($user['nombre']) ? $user['nombreEmpresa'] : $user['nombre'], 'payment' => empty($payment_types[$user['idPago']]) ? 'Not Defined':   $payment_types[$user['idPago']]);
        }
        return ($users_payments_returned);
    }
}
