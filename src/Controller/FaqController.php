<?php

namespace App\Controller;

use App\Entity\Main\Ayuda;
use App\Entity\Main\CasasDeApuestas;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class FaqController extends AbstractController
{
    const LOGOS_FOLDER = 'clients';

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
        $this->userToken = $tokenStorage->getToken()  ;
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        if(!empty($this->userToken)){
            $this->user = $this->userToken->getUser();
        }
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/faqs", name="app_faq")
     */
    public function index(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);
        $faqs = $this->getFaqs();

        return $this->render('faq/index.html.twig',
            [
                'title' => 'Faqs',
                'user' => $this->user,
                'alerts' => $alerts,
                'faqs' => addslashes(json_encode($faqs))
            ]
        );
    }

    public function getFaqs(){
        $faqs=  $this->serializer->normalize($this->em->getRepository(Ayuda::class)->findAll());
        return $faqs;
    }

    /**
     * @Route("/faq/save", name="app_faq_save")
     */
    public function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $newData = $request->get('newData') ?? $request->request->all();

        foreach($newData as $key => $val){
            if(is_array($val)){
                $newData[$key]= join(',',$val);
            }
        }

        foreach($newData as $key => $val){
            if(is_array($val)){
                $newData[$key]= join(',',$val);
            }
        }
        $id = $request->get('id');

        $FaqObj = $this->em->getRepository(Ayuda::class)->find($id);
        if(empty($FaqObj) or !$this->checkRealId($id)){
            $FaqObj = new Ayuda();
        }

        if(isset($newData["actayuda"])){
            $active = empty($newData['actayuda']) || $newData['actayuda'] == 'false' ? 0: 1;
            $FaqObj->setActayuda($active);
        }

        if(isset($newData["contenido"])){
            $FaqObj->setContenido($newData['contenido']);
        }

        if(isset($newData["contenidoDe"])){
            $FaqObj->setContenidoDe($newData['contenidoDe']);
        }

        if(isset($newData["contenidoEn"])){
            $FaqObj->setContenidoEn($newData['contenidoEn']);
        }

        if(isset($newData["contenidoFr"])){
            $FaqObj->setContenidoFr($newData['contenidoFr']);
        }

        if(isset($newData["contenidoIt"])){
            $FaqObj->setContenidoIt($newData['contenidoIt']);
        }

        if(isset($newData["contenidoPt"])){
            $FaqObj->setContenidoPt($newData['contenidoPt']);
        }

        if(isset($newData["idCasPais"])){
            $FaqObj->setIdCasPais($newData['idCasPais']);
        }

        if(isset($newData["imagen"])){
            $FaqObj->setImagen($newData['imagen']);
        }

        if(isset($newData["titulo"])){
            $FaqObj->setTitulo($newData['titulo']);
        }

        if(isset($newData["tituloDe"])){
            $FaqObj->setTituloDe($newData['tituloDe']);
        }

        if(isset($newData["tituloEn"])){
            $FaqObj->setTituloEn($newData['tituloEn']);
        }

        if(isset($newData["tituloFr"])){
            $FaqObj->setTituloFr($newData['tituloFr']);
        }

        if(isset($newData["tituloIt"])){
            $FaqObj->setTituloIt($newData['tituloIt']);
        }

        if(isset($newData["tituloPt"])){
            $FaqObj->setTituloPt($newData['tituloPt']);
        }

        $fecha = date('Y-m-d H:i:s');
        $FaqObj->setFecha($fecha);


        $doctrine->getManager()->persist($FaqObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=> 'Faq saved', 'data'=>$FaqObj));
    }


}
