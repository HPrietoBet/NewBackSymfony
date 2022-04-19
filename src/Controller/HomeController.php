<?php

namespace App\Controller;

use App\Entity\Premiumpay\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\Persistence\ManagerRegistry;


class HomeController extends AbstractController
{
    private $version;
    private $user;
    private $lang;
    private $em;
    private $userToken;

    protected $tokenStorage;

    public function __construct($lang = 'en',  ManagerRegistry $doctrine, TokenStorageInterface $tokenStorage) {

        $this->lang = $lang;
        $this->em = $doctrine;
        $this->userToken = $tokenStorage->getToken();
    }
    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        // CHEQUEO LOGADO DE USUARIO //

        $this->user = $this->userToken->getUser();

        return $this->render('home/index.html.twig', [
        'user' => $this->user,
        ]);
    }
}
