<?php

namespace App\Controller;

use App\Entity\Main\ConexionesApi;
use App\Entity\Main\LoginBookies;
use App\Lib\Roles;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiConnectionController extends AbstractController
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
        $this->userToken = $tokenStorage->getToken();        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);

        /* control de accesos (view)*/
        $this->perms = new Roles($this->userToken, $doctrine);
        $this->access = $this->perms->checkAccess();
        $this->actionsLocked = $this->access['actions'];
        if(!empty($this->access['uri'])){
            $this->redirectToHome();
        }
        /* fin control de accesos */
    }

    /**
     * @Route("/api_connections", name="app_api_connections")
     */
    public function index(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        $this->user = $this->userToken->getUser();
        // CHEQUEO LOGADO DE USUARIO //

        $alerts = $this->getAlerts(10);
        $apiConnections = $this->em->getRepository(ConexionesApi::class)->findAll();
        $apiConnections_array = $this->serializer->normalize($apiConnections);

        return $this->render('api_connection/index.html.twig',
            [
                'title' => 'Api Connections',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'connections' => json_encode($apiConnections_array),
                'actionsLocked' => json_encode($this->actionsLocked)
            ]
        );
    }

    /**
     * @Route("/api_connections/save", name="app_api_connections_save")
     */
    public function save(Request $request, ManagerRegistry $doctrine): Response
    {
        $newData = $request->get('newData');
        $id = $request->get('id');

        $apiObj = $doctrine->getRepository(ConexionesApi::class)->find($id);
        if(empty($apiObj) or !$this->checkRealId($id)){
            $apiObj = new ConexionesApi();
        }

        if(isset($newData["activo"])){
            $active = (empty($newData['activo']) || $newData['activo'] == 'false')? 0: 1;
            $apiObj->setActivo($active);
        }

        if(isset($newData['nombreApi'])){
            $apiObj->setNombreApi($newData['nombreApi']);
        }

        if(isset($newData["nombrePublico"])){
            $apiObj->setNombrePublico($newData['nombrePublico']);
        }

        $doctrine->getManager()->persist($apiObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=> 'api connection saved', 'data'=>$apiObj));
    }


}

