<?php

namespace App\Controller;

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



class SuperUsersController extends AbstractController
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
        $this->userToken = $tokenStorage->getToken();        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/users/admin", name="app_super_users")
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
        $superUsers = $this->em->getRepository(LoginAdmin::class)->findAll();
        $superUsers_array = $this->serializer->normalize($superUsers);
        $responsables = $this->getResponsables();

        return $this->render('super_users/index.html.twig',
            [
                'title' => 'Super Users',
                        'user' => $this->user,
        'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'superusers' => json_encode($superUsers_array),
                'responsables' => $responsables,

            ]
        );

    }
    public function getResponsables(){
        $responsables = $this->em->getRepository(LoginAdmin::class)->findBy(['esResponsable' => 1]);
        $responsables_array = $this->serializer->normalize($responsables);
        $responsables_return = array();
        foreach ($responsables_array as $responsable){
            $responsables_return[] = array('id'=> $responsable['id'], 'user' => $responsable['user']);
        }
        return json_encode($responsables_return);
    }

    /**
     * @Route("/user/admin/save", name="app_super_users_save")
     */
    public function save(Request $request, ManagerRegistry $doctrine): Response
    {
        $newData = $request->get('newData');
        $id = $request->get('id');

        $userObj = $doctrine->getRepository(LoginAdmin::class)->find($id);
        if(empty($userObj) or !$this->checkRealId($id)){
            $userObj = new LoginAdmin();
        }

        if(isset($newData["user"])){
            $userObj->setUser($newData['user'])	;
        }
        if(isset($newData["username"])){
            $userObj->setUsername($newData['username'])	;
        }

        if(isset($newData["plainpassword"])){
            $userObj->setPlainpassword($newData['plainpassword'])	;
            $userObj->setPasswordId(sha1($newData['plainpassword']))	;
            $userObj->setPassword(password_hash($newData['plainpassword'], PASSWORD_BCRYPT));
        }

        if(isset($newData["nivel_user"])){
            $userObj->setNivelUser($newData['nivel_user'])	;
        }

        if(isset($newData["roles"])){
            $userObj->setRoles($newData['roles'])	;
        }

        if(isset($newData["responsable"])){
            $userObj->setResponsable($newData['responsable'])	;
        }

        if(isset($newData["lang"])){
            $userObj->setLang($newData['lang'])	;
        }

        if(isset($newData["telefono"])){
            $userObj->setTelefono($newData['telefono'])	;
        }

        if(isset($newData["ultimoacceso"])){
            $userObj->setUltimoacceso($newData['ultimoacceso'])	;
        }

        if(isset($newData["myip"])){
            $userObj->setMyip($newData['myip'])	;
        }

        if(isset($newData["es_responsable"])){
            $userObj->setEsResponsable($newData['es_responsable'])	;
        }

        if(isset($newData["activo"])){
            $active = (empty($newData['activo']) || $newData['activo'] == 'false')? 0: 1;
            $userObj->setActivo($active);
        }


        $doctrine->getManager()->persist($userObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=> 'user saved'));
    }
}
