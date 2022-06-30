<?php

namespace App\Controller;

use App\Entity\Main\CampaniasUsuario;
use App\Entity\Main\LoginAdmin;
use App\Entity\Main\LoginBusiness;
use App\Entity\Main\UsuarioComentarios;
use App\Entity\Main\UsuariosAceptarterminos;
use App\Entity\Main\UsuariosFuentes;
use App\Repository\Main\UsuariosTerminosRepository;
use App\Repository\Premiumpay\PasarelasBetanDealPaymentdataRepository;
use App\Repository\Premiumpay\PasarelasBetanDealRepository;
use Doctrine\ORM\Query\Expr\Select;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Lib\iApuestas;

class UsersController extends AbstractController
{
    const PASSADMIN = 'Betandeal2020';

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
     * @Route("/users/list", name="app_users")
     */
    public function index(): Response
    {

        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }

        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        $responsables_search = $this->getResponsables($filter= true);

        $userEntity = new LoginBusiness();

        $users = $this->getAllUsers();
        $ids = array_column($users, 'id');
        $ids_search = array();
        foreach($ids as $id){
            $ids_search[$id] = $id;
        }
        $usernames = array_column($users, 'username');
        $users_search = array();
        foreach($usernames as $user){
            $users_search[$user] = $user;
        }

        $filterform = $this->createFormBuilder($userEntity)
            ->add('id', ChoiceType::class, array('choices'=>$ids_search, 'attr'=>array('class' => 'col form-control selectpicker  ', 'multiple'=>true, 'expanded' => true, 'data-live-search'=>true), 'label'=>'Id'))
            ->add('username', ChoiceType::class,array('choices'=>$users_search, 'attr'=>array('class' => 'form-control selectpicker', 'multiple'=>true, 'data-live-search'=>true, 'data-actions-box'=>true, 'expanded'=>true), 'label'=>'Username'))
            ->add('activo', ChoiceType::class, array('choices'=>array('Todos'=> 2, 'Active'=> true, 'Not Active'=>false), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Active?'))
            ->add('responsable', ChoiceType::class, array('choices'=>$responsables_search, 'attr'=>array('class' => 'col form-control selectpicker  ', 'multiple'=>true, 'data-live-search'=>true), 'label'=>'Responsible'))
            ->add('lang', LanguageType::class, array('attr'=>array('class' => 'form-control selectpicker ', 'multiple'=>true, 'data-live-search'=>true), 'label'=>'Language'))
            ->add('country', CountryType::class, array('attr'=>array('class' => 'form-control selectpicker ', 'multiple'=>true, 'data-live-search'=>true), 'label'=>'Country'))
            ->add('search_users', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();


        //$users = $this->getAllInfoUsers();



        return $this->render('users/index.html.twig',
            [
                'title' => 'Affiliates',
                        'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'users' => $users,
                'formfilter' => $filterform->createView(),
                'responsables' => json_encode($this->getResponsables())
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
            $expires_date = date('Y-m-d H:i:s' , strtotime( date('Y-m-d H:i:s'). ' + 30 minute'));
            $active = (empty($newData['adminLogin']) || $newData['adminLogin'] == 'false')? false: true;
            $userObj->setAdminLogin($active);
            $userObj->setAdminLoginPassword(sha1(self::PASSADMIN));
            $userObj->setAdminLoginExpires($expires_date);
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
            $this->prepareIApuestas($id, $active);
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

        if(isset($newData["plainpassword"])){
            $userObj->setPasswordId(sha1($newData['plainpassword']));
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

        if(isset($newData['comentarios'])){

            $commentsObj =  new UsuarioComentarios();
            $commentsObj->setIdUsuario($id);
            $commentsObj->setFecha(date('Y-m-d H:i:s'));
            $commentsObj->setComentario($newData['comentarios']);
            $commentsObj->setUsuario($this->user->getUsername());

            $doctrine->getManager()->persist($commentsObj);
            $doctrine->getManager()->flush();

        }


        return $this->json(array('success'=> 1, 'msg'=> 'user saved'));

    }

    public function getAllUsers(){
        $users = $this->em->getRepository(LoginBusiness::class)->findAll();
        $users_array = $this->serializer->normalize($users);
        $x = 0;
        foreach($users_array as $user){
            if($user['username'] == '') unset ($users_array[$x]);
            $x++;
        }
        return $users_array;

    }

    /**
     * @Route("/users/get", name="app_users_get")
     */
    public function getusersBy(Request $request, ManagerRegistry $doctrine): Response
    {
        $filter = $request->request->all();
        $filter = $filter['data'];
            foreach($filter['activo'] as $act){
                $filter['activo'] = $act[0];
            }

            if($filter['activo'] == 1) $filter['activo'] = 1;
            if($filter['activo'] == 0) $filter['activo'] = 0;
            if($filter['activo'] == 2) unset($filter['activo']);

        unset($filter['_token']);
        $users = $this->em->getRepository(LoginBusiness::class)->findBy($filter);
        $users_array = $this->serializer->normalize($users);
        $users_end = array();
        $users_ids = array();
        foreach ($users_array as $last_user){
            /* fuentes de trafico */
            $user_traffic = $this->em->getRepository(UsuariosFuentes::class)->findBy(array('idUsuario'=>$last_user['id']));
            unset($last_user['roles']);
            $last_user['trafficType'] = $this->serializer->normalize($user_traffic)[0]['tipo'] ?? '' ;
            $last_user['trafficUrl'] = $this->serializer->normalize($user_traffic)[0]['url'] ?? '';

            /* comentarios */
            $user_comments = $this->em->getRepository(UsuarioComentarios::class)->findBy(['idUsuario' => $last_user['id']]);
            $user_comments = $this->serializer->normalize($user_comments);
            $last_user['comentarios_anteriores']= '';
            foreach($user_comments as $comment){
                $last_user['comentarios_anteriores'].= $comment['fecha']. ' | '.$comment['comentario']. ' | '.$comment['usuario'].PHP_EOL.PHP_EOL;
            }
            $last_user['comentario'] = '';

            $users_terms = $this->em->getRepository(UsuariosAceptarterminos::class)->findOneBy(['idUsuario' => $last_user['id']]);
            $users_terms = $this->serializer->normalize($users_terms);
            $last_user['politica'] = $users_terms['aceptaPolitica'] ?? false;
            $last_user['terminos'] =  $users_terms['aceptaTerminos'] ?? false;

            $users_end[] = $last_user;


        }
        return $this->json(array('success'=> 1, 'msg'=> 'finded users', 'data'=> $users_end));

        $last_user_array = $this->serializer->normalize($last_users);

    }

    public function getResponsables($filter =false){
        $responsables_filtro = array();
        $responsables = $this->em->getRepository(LoginAdmin::class)->findBy(['esResponsable'=>1]);
        $responsables_array = $this->serializer->normalize($responsables);
        if(!empty($filter)){
            foreach($responsables_array as $responsable){
                $responsables_filtro[$responsable['user']] = $responsable['id'];
            }
            return $responsables_filtro;
        }else{
            return $responsables_array;
        }
    }

    private function prepareIApuestas($id, $active){
        $libIApuestas = new iApuestas($this->em);
        $libIApuestas->prepareIApuestas($id, $active);
    }

    /**
     * @Route("/users/terms-and-conditions", name="app_users_terms_get")
     */
    public function usersTermsLIst(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        $this->user = $this->userToken->getUser();
        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        $responsables_search = $this->getResponsables($filter= true);

        $userEntity = new LoginBusiness();

        $usersTerms  = $this->getUsersTerms();

        return $this->render('users/terms.html.twig',
            [
                'title' => 'Affiliates Terms and Conditions',
                        'user' => $this->user,
        'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'users' => json_encode($usersTerms),
            ]
        );
    }

    public function getUsersTerms(){
        return $this->em->getRepository(UsuariosAceptarterminos::class)->getUsersTerms();

    }

    /**
     * @Route("/user/campaigns/get", name="app_users_campaigns_get")
     */
    public function getCampaignsPerUser(Request $request){
        $idUser = $request->request->get('userId');
        $camps = $this->serializer->normalize($this->em->getRepository(CampaniasUsuario::class)->findByUserWithCampaign($idUser));
        $camps_return = array();

        foreach($camps as $item){
            $camps_return[$item['idCampaniaUsuario']] = $item;
        }
        echo json_encode($camps_return) ;
        die();
    }
    /**
     * @Route("/user/pasarelas/get", name="app_users_pasarelas_get")
     */
    public function getPasarelasPerUser(Request $request){
        $idUser = $request->request->get('userId');
        $pasarelas = $this->serializer->normalize($this->em->getRepository(PasarelasBetanDealRepository::class)->findBy(['idpasarela'=>$idUser]));
        $pasarelas_return = array();

        foreach($pasarelas as $item){
            $pasarelas_return_return[$item['id']] = $item;
        }
        echo json_encode($pasarelas_return) ;
        die();
    }

    /**
     * @Route("/users/loginadmin/set", name="user_admin_login_set")
     */
    public function setUserLoginAdmin(Request $request, ManagerRegistry $doctrine)
    {
        $user = $request->request->get('user');
        $userObj = $this->em->getRepository(LoginBusiness::class)->findOneBy(['username' => $user]);
        if(!empty($userObj)) {
            $expires_date = date('Y-m-d H:i:s' , strtotime( date('Y-m-d H:i:s'). ' + 30 minute'));
            $active = true;
            $userObj->setAdminLogin($active);
            $userObj->setAdminLoginPassword(sha1(self::PASSADMIN));
            $userObj->setAdminLoginExpires($expires_date);
            $doctrine->getManager()->persist($userObj);
            $doctrine->getManager()->flush();

            return $this->json(array('success'=>1, 'msg'=>'User available to login'));
        }
        return $this->json(array('success'=>0, 'msg'=>'User not selected'));
    }
}
