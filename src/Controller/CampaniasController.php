<?php

namespace App\Controller;

use App\Entity\Main\LoginBookies;
use App\Entity\Old\Campanias;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CampaniasController extends AbstractController
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
     * @Route("/campanias", name="app_campanias")
     */
    public function index(): Response
    {
        return $this->render('campanias/index.html.twig', [
            'controller_name' => 'CampaniasController',
        ]);
    }

    /**
     * @Route("/campanias/get", name="app_campanias_get")
     */
    public function getCampaigns(Request $request, ManagerRegistry $doctrine): Response{
        $campaniasObj = $doctrine->getRepository(\App\Entity\Main\Campanias::class)->findBy(['actcamp' => 1]);
        $campanias_array = $this->serializer->normalize($campaniasObj);
        $campanias_return = $this->getSpecificFields($campanias_array, $fields = array('id', 'titcamp'));


        return $this->json(array('data' =>$campanias_return));
    }
}
