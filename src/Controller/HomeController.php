<?php

namespace App\Controller;

use App\Entity\Premiumpay\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\Persistence\ManagerRegistry;



class HomeController extends AbstractController
{
    private $translations;
    private $user;
    private $version;
    private $lang;
    private $poloader;
    private $em;


    public function __construct($lang = 'en',  ManagerRegistry $doctrine){
        $this->lang = $lang;
        $this->em = $doctrine;
    }
    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
        'test' => 'test'
        ]);
    }
}
