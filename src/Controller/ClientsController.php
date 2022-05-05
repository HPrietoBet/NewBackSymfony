<?php

namespace App\Controller;

use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\LoginAdmin;
use App\Entity\Main\CasasDeApuestasComentarios;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ClientsController extends AbstractController
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
        $this->userToken = $tokenStorage->getToken();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/clients", name="app_clients")
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
        $responsables_search = $this->getResponsables($filter= true);

        $clientsEntity = new CasasDeApuestas();
        $clients = $this->getAllClients();
        $ids = array_column($clients, 'idCasa');
        $casas = array_column($clients, 'titcasa');
        foreach($ids as $id){
            $ids_search[$id] = $id;
        }
        $casas_search = array();
        foreach($casas as $casa){
            $casas_search[$casa] = $casa;
        }


        return $this->render('clients/index.html.twig',
            [
                'title' => 'Clients',
                'user' => $this->user,
                'alerts' =>$alerts,
                'clients' => json_encode($clients),
                'responsables' => json_encode($this->getResponsables())
            ]
        );
    }

    public function getResponsables($filter =false){
        $responsables_filtro = array();
        $responsables = $this->em->getRepository(LoginAdmin::class)->findBy(['esResponsable'=>1]);
        $responsables_array = $this->serializer->normalize($responsables);
        if(!empty($filter)){
            foreach($responsables_array as $responsable){
                $responsables_filtro[$responsable['user']] = $responsable['id'];
            }
            return $responsables_filtro;
        }else{
            return $responsables_array;
        }
    }
    public function getAllClients(){
        $clients =  $this->serializer->normalize($this->em->getRepository(CasasDeApuestas::class)->getAllAboutClient());
        $x = 0;
        foreach($clients as $client){
            $clients[$x]['comments'] = $this->serializer->normalize($this->em->getRepository(CasasDeApuestasComentarios::class)->find($client['idCasa']));
        }
        return $clients;
    }


}


