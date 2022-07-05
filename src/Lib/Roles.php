<?php
namespace App\Lib;

use App\Entity\Main\Accesos;
use App\Entity\Main\LoginAdmin;
use App\Entity\Main\LoginBusiness;
use Doctrine\Bundle\DoctrineBundle\Dbal\ManagerRegistryAwareConnectionProvider;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouteCollection;
class Roles
{
    public $userRol;
    public $user;
    public $uri;
    public $em;
    const SUPERADMIN ='SUPER_ADMIN';


    public function  __construct($userToken, ManagerRegistry $doctrine){

        $this->uri = $_SERVER['REQUEST_URI'];
        $this->user = $userToken;
        $this->userRol = $this->user->getUser()->getRoles();
        $this->userId = $this->user->getUser()->getId();
        $this->isResponsable = $this->user->getUser()->getEsResponsable();

        $this->em = $doctrine;
    }

    public function checkAccess(){
        $locks = array(
            'uri' => false,
            'actions' => array(),
            'users' => array(),
            'menu' => array()
        );
        // chequeamos si la url tiene el patron de bloqueo para visualización
        $locks['menu'] = $this->menusLocked();
        $locks['uri'] = $this->checkUri();
        // chequeamos si la url tiene el patron de bloqueo para acciones
        $locks['actions'] = $this->checkActions();
        // chequeamos menus a retirar
        return $locks;
    }

    public function checkUri(){
        $restrictions = $this->em->getRepository(Accesos::class)->findBy(['role'=>$this->userRol, 'active' => 1, 'action'=>'view']);

        foreach($restrictions as $locked){
            $locks['actions'][] = $locked->getUri();
            preg_match('/'.preg_quote($locked->getUri(), '/').'/', $this->uri, $match);
            if(!empty($match)){
                return true;
            }
        }
    }

    public function checkActions(){
        $restrictions = $this->em->getRepository(Accesos::class)->findBy(['role'=>$this->userRol, 'active' => 1]);
        $actions = array();
        foreach($restrictions as $locked){
            preg_match('/'.preg_quote($locked->getUri(), '/').'/', $this->uri, $match);
            if(!empty($match)){
                $actions[] = $locked->getAction();
            }
        }
        return $actions;
    }

    public function checkUsers(){
        $users = array();
        $usersId = array(
            $this->userId
        );
        if(!empty($this->isResponsable)){
            $subordinados = $this->em->getRepository(LoginAdmin::class)->findBy(['responsable' => $this->userId]);
            foreach ($subordinados as $subordinado){
                $usersId[] = $subordinado->getId();
            }
        }
        if($this->userRol != self::SUPERADMIN){
            $users = $this->em->getRepository(LoginBusiness::class)->findBy(['responsable' => $usersId]);
        }
        return $users;
    }

    public function menusLocked(){
        $restrictions = $this->em->getRepository(Accesos::class)->findBy(['role'=>$this->userRol, 'active' => 1, 'action'=>'view']);
        $locks = array();
        foreach($restrictions as $locked){
            $locks[] = $locked->getUri();
        }
        return $locks;
    }
}