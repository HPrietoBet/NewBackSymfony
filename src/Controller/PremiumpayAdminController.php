<?php

namespace App\Controller;

use App\Entity\Main\LoginAdmin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Doctrine\Persistence\ManagerRegistry;

class PremiumpayAdminController extends AbstractController
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
        $this->userToken = $tokenStorage->getToken();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->user = $this->userToken->getUser();
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/premiumpay/admin", name="app_premiumpay_admin")
     */
    public function index()
    {
        $iframe = '';
        $alerts = $this->getAlerts(10);
        if($this->checkRoleUser($this->user)){
            $this->setToken();
            $iframe = 'https://pre.premiumpay.pro/impersonateadmin/'.$this->user->getImpersonateToken();
        }

        return $this->render('premiumpay_admin/index.html.twig',
            [
                'title' => 'Invoicing Info',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'iframe' => $iframe
            ]
        );
    }

    private function setToken(){
        $token = sha1($this->user->getUsername().'/'.$this->user->getId().'/'.date('YmdHis')) ?? false;
        $adminObj = $this->em->getRepository(LoginAdmin::class)->find($this->user->getId());
        if(!empty($token) && !empty($adminObj)){
            $adminObj->setImpersonateToken($token);
            $res = $this->em->getManager()->persist($adminObj);
            $this->em->getManager()->flush();
            if(!empty($this->user->getImpersonateToken())) return true;
        }
        return false;
    }
}
