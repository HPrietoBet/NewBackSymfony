<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteCreatorController extends AbstractController
{
    /**
     * @Route("/site-creator", name="app_site_creator")
     */
    public function index(): Response
    {
        return $this->render('site_creator/index.html.twig', [
            'controller_name' => 'SiteCreatorController',
        ]);
    }
}
