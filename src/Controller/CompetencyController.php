<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetencyController extends AbstractController
{
    /**
     * @Route("/competency", name="app_competency")
     */
    public function index(): Response
    {
        return $this->render('competency/index.html.twig', [
            'controller_name' => 'CompetencyController',
        ]);
    }
}
