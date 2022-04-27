<?php

namespace App\Controller;

use App\Entity\Main\LoginAdmin;
use App\Entity\Main\LoginBusiness;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UsersController extends AbstractController
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
     * @Route("/users/list", name="app_users")
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

        return $this->render('users/index.html.twig',
            [
                'title' => 'Affiliates',
                'user' => $this->user,
                'alerts' =>$alerts,

            ]
        );
    }

    /**
     * @Route("/user/save", name="app_users_save")
     */
    public function save(Request $request, ManagerRegistry $doctrine): Response
    {
        $newData = $request->get('newData');
        $id = $request->get('id');

        $userObj = $doctrine->getRepository(LoginBusiness::class)->find($id);

        if(isset($newData["aceptaPremiumpay"])){
            $active = (empty($newData['aceptaPremiumpay']) || $newData['aceptaPremiumpay'] == 'false')? 0: 1;
            $userObj->setAceptaPremiumpay($active);
        }

        if(isset($newData["activeRefunds"])){
            $active = (empty($newData['activeRefunds']) || $newData['activeRefunds'] == 'false')? 0: 1;
            $userObj->setActiveRefunds($active);
        }

        if(isset($newData["activo"])){
            $active = (empty($newData['activo']) || $newData['activo'] == 'false')? 0: 1;
            $userObj->setActivo($active);
        }

        if(isset($newData["adminLogin"])){
            $active = (empty($newData['adminLogin']) || $newData['adminLogin'] == 'false')? 0: 1;
            $userObj->setAdminLogin($active);
        }

        if(isset($newData["adminLoginExpires"])){
            $userObj->setAdminLoginExpires($newData['adminLoginExpires']);
        }

        if(isset($newData["adminLoginPassword"])){
            $userObj->setAdminLoginPassword($newData['adminLoginPassword']);
        }

        if(isset($newData["avatar"])){
            $userObj->setAvatar($newData['avatar']);
        }

        if(isset($newData["comisionPay"])){
            $userObj->setComisionPay($newData['comisionPay']);
        }

        if(isset($newData["country"])){
            $userObj->setCountry($newData['country']);
        }

        if(isset($newData["enlacesIapuestas"])){
            $active = (empty($newData['enlacesIapuestas']) || $newData['enlacesIapuestas'] == 'false')? 0: 1;
            $userObj->setEnlacesIapuestas($active);
        }

        if(isset($newData["facebook"])){
            $userObj->setFacebook($newData['facebook']);
        }

        if(isset($newData["fuentesTrafico"])){
            $userObj->setFuentesTrafico($newData['fuentesTrafico']);
        }

        if(isset($newData["husoHorario"])){
            $userObj->setHusoHorario($newData['husoHorario']);
        }

        if(isset($newData["idPago"])){
            $userObj->setIdPago($newData['idPago']);
        }

        if(isset($newData["instagram"])){
            $userObj->setInstagram($newData['instagram']);
        }

        if(isset($newData["landingcreator"])){
            $active = (empty($newData['landingcreator']) || $newData['landingcreator'] == 'false')? 0: 1;
            $userObj->setLandingcreator($active);
        }

        if(isset($newData["lang"])){
            $userObj->setLang($newData['lang']);
        }

        if(isset($newData["lastLogin"])){
            $userObj->setLastLogin($newData['lastLogin']);
        }

        if(isset($newData["linksDirectos"])){
            $active = (empty($newData['linksDirectos']) || $newData['linksDirectos'] == 'false')? 0: 1;
            $userObj->setLinksDirectos($active);
        }

        if(isset($newData["linksDirectosItalia"])){
            $active = (empty($newData['linksDirectosItalia']) || $newData['linksDirectosItalia'] == 'false')? 0: 1;
            $userObj->setLinksDirectosItalia($active);
        }

        if(isset($newData["marketing"])){
            $active = (empty($newData['marketing']) || $newData['marketing'] == 'false')? 0: 1;
            $userObj->setMarketing($active);
        }

        if(isset($newData["mostrarAdminlogin"])){
            $active = (empty($newData['mostrarAdminlogin']) || $newData['mostrarAdminlogin'] == 'false')? 0: 1;
            $userObj->setMostrarAdminlogin($active);
        }

        if(isset($newData["myip"])){
            $userObj->setMyip($newData['myip']);
        }

        if(isset($newData["nivelUser"])){
            $userObj->setNivelUser($newData['nivelUser']);
        }

        if(isset($newData["nuevoBetandeal"])){
            $userObj->setNuevoBetandeal($newData['nuevoBetandeal']);
        }

        if(isset($newData["numcuenta"])){
            $userObj->setNumcuenta($newData['numcuenta']);
        }

        if(isset($newData["otraUrl"])){
            $userObj->setOtraUrl($newData['otraUrl']);
        }

        if(isset($newData["pagoCustom"])){
            $userObj->setPagoCustom($newData['pagoCustom']);
        }

        if(isset($newData["pagoMin"])){
            $userObj->setPagoMin($newData['pagoMin']);
        }

        if(isset($newData["passwordId"])){
            $userObj->setPasswordId($newData['passwordId']);
        }

        if(isset($newData["payu"])){
            $active = (empty($newData['payu']) || $newData['payu'] == 'false')? 0: 1;
            $userObj->setPayu($active);
        }

        if(isset($newData["plainpassword"])){
            $userObj->setPlainpassword($newData['plainpassword']);
        }

        if(isset($newData["prefijo"])){
            $userObj->setPrefijo($newData['prefijo']);
        }

        if(isset($newData["premiumpay"])){
            $active = (empty($newData['premiumpay']) || $newData['premiumpay'] == 'false')? 0: 1;
            $userObj->setPremiumpay($active);
        }

        if(isset($newData["responsable"])){
            $userObj->setResponsable($newData['responsable']);
        }

        if(isset($newData["telefono"])){
            $userObj->setTelefono($newData['telefono']);
        }

        if(isset($newData["telegram"])){
            $userObj->setTelegram($newData['telegram']);
        }

        if(isset($newData["twitter"])){
            $userObj->setTwitter($newData['twitter']);
        }

        if(isset($newData["urlWeb"])){
            $userObj->setUrlWeb($newData['urlWeb']);
        }

        if(isset($newData["user"])){
            $userObj->setUser($newData['user']);
        }

        if(isset($newData["username"])){
            $userObj->setUsername($newData['username']);
        }

        if(isset($newData["verCpas"])){
            $active = (empty($newData['verCpas']) || $newData['verCpas'] == 'false')? 0: 1;
            $userObj->setVerCpas($active);
        }

        $doctrine->getManager()->persist($userObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=> 'user saved'));

    }
}
