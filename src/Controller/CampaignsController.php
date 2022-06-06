<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CampaignsController extends AbstractController
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
        if(!empty($tokenStorage->getToken())){
            $this->userToken = $tokenStorage->getToken();
            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $this->user = $this->userToken->getUser();
            $this->serializer = new Serializer($normalizers, $encoders);
        }
    }

    /**
     * @Route("/campaigns/list", name="app_campaigns_list")
     */
    public function index(): Response
    {
        if(empty($this->userToken)){
            return $this->redirect('/login');
        }

        $alerts = $this->getAlerts(10);
        $campaigns = $this->getCampaigns();

        return $this->render('campaigns/index.html.twig',
            [
                'title' => 'Campaigns',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'campaigns' => addslashes(json_encode($campaigns)),
            ]
        );
    }
}
