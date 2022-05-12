<?php

namespace App\Controller;

use App\Entity\Main\Ayuda;
use App\Entity\Main\CasasDeApuestas;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
                'faqs' =>json_encode($faqs, JSON_PRETTY_PRINT)
            ]
        );
    }

    public function getFaqs(){
        $faqs=  $this->serializer->normalize($this->em->getRepository(Ayuda::class)->findAll());
        return $faqs;

    }
}
