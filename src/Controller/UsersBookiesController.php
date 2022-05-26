<?php

namespace App\Controller;

use App\Entity\Main\Campanias;
use App\Entity\Main\LoginBookies;
use App\Entity\Main\LoginBusiness;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\Main\LoginAdmin;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;



class UsersBookiesController extends AbstractController
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

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/users/bookies", name="app_users_bookies")
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
        $users_bookies = $this->em->getRepository(LoginBookies::class)->findAll();
        $users_bookies_array = $this->serializer->normalize($users_bookies);
        $x = 0;
        foreach($users_bookies_array as $bookie){
            $users_bookies_array[$x]['campanias'] = join(',', json_decode($bookie['campanias']));
            $x++;
        }
        $campaigns_json = json_encode($this->getCampaigns());


        return $this->render('users_bookies/index.html.twig',
            [
                'title' => 'Users Bookies',
                'user' => $this->user,
                'alerts' =>$alerts,
                'bookies' => json_encode($users_bookies_array),
                'campaigns' => $campaigns_json,

            ]
        );

    }

    /**
     * @Route("/user/bookie/save", name="app_users_bookies_save")
     */
    public function save(Request $request, ManagerRegistry $doctrine): Response
    {
        $newData = $request->get('newData');
        $id = $request->get('id');

        $userObj = $doctrine->getRepository(LoginBookies::class)->find($id);
        if(empty($userObj) or !$this->checkRealId($id)){
            $userObj = new LoginBookies();
        }

        if(isset($newData["activo"])){
            $active = (empty($newData['activo']) || $newData['activo'] == 'false')? 0: 1;
            $userObj->setActivo($active);
        }

        if(isset($newData["email"])){
            $userObj->setEmail($newData['email']);
        }

        if(isset($newData["ip"])){
            $userObj->setIp($newData['ip']);
        }

        if(isset($newData["plainPassword"])){
            $userObj->setPlainPassword($newData['plainPassword']);
            $userObj->setPassword(password_hash($newData['plainPassword'], PASSWORD_BCRYPT));
        }

        if(isset($newData["ultimoLogin"])){
            $userObj->setUltimoLogin($newData['ultimoLogin']);
        }else{
            $userObj->setUltimoLogin(date('Y-m-d H:i:s'));
        }

        if(isset($newData["username"])){
            $userObj->setUsername($newData['username']);
        }

        if(isset($newData["campanias"])){
            $campanias_array = explode(',', $newData["campanias"]);
            $campanias_json= json_encode($campanias_array);
            $userObj->setCampanias($campanias_json);
        }


        $doctrine->getManager()->persist($userObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=> 'user saved'));
    }

    /**
     * @Route("/user/bookie/delete", name="app_users_bookies_delete")
     */
    public function delete(Request $request, ManagerRegistry $doctrine): Response
    {
        $id = $request->get('id');

        $userObj = $doctrine->getRepository(LoginBookies::class)->find($id);
        if(!empty($userObj)){
            $doctrine->getRepository(LoginBookies::class)->remove($userObj);
        }
        return $this->json(array('success'=> 1, 'msg'=> 'user deleted'));
    }

    public function getCampaigns(){
        $campaigns = $this->em->getRepository(Campanias::class)->findBy(['actcamp'=>1]);
        $campaigns_array = $this->serializer->normalize($campaigns);
        $campanias_return = $this->getSpecificFields($campaigns_array, $fields = array('id', 'titcamp'));
        $x = 0;
        foreach($campanias_return as $item){
            $campanias_return[$x]['show'] ='#'.$item['id'].' - '.$item['titcamp'];
            $x++;
        }
        return $campanias_return;
    }

}



//$pass = password_hash($params['password'], PASSWORD_BCRYPT);