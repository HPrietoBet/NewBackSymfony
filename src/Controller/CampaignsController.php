<?php

namespace App\Controller;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasCodes;
use App\Entity\Main\CampaniasEnlace;
use App\Entity\Main\CampaniasUsuario;
use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\CasasIapuestas;
use App\Entity\Main\CategoriasCampania;
use App\Entity\Main\ComisionesPendientesCajero;
use App\Entity\Main\ConexionesApi;
use App\Entity\Main\LoginAdmin;
use App\Entity\Main\LoginBusiness;
use App\Service\FileUploader;
use Doctrine\Persistence\ManagerRegistry;
use MongoDB\Driver\Manager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\File;

class CampaignsController extends AbstractController
{
    const CSV_FOLDER = 'codes';

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
     * @Route("/campaigns", name="app_campaigns_list")
     */
    public function index(): Response
    {
        if(empty($this->userToken)){
            return $this->redirect('/login');
        }

        $alerts = $this->getAlerts(10);
        $array_camps = $this->prepareTable($this->getCampaigns());

        return $this->render('campaigns/index.html.twig',
            [
                'title' => 'Campaigns',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'campaigns' => addslashes(json_encode($array_camps)),
                'responsables' => addslashes(json_encode($this->getResponsablesAll()))
            ]
        );
    }

    public function getResponsablesAll(){
        return $this->serializer->normalize($this->em->getRepository(LoginAdmin::class)->findAll());
    }

    public function getCampaigns(){
        return $this->serializer->normalize($this->em->getRepository(Campanias::class)->findAll());
    }

    public function getClients($idCasa){
        return $this->em->getRepository(CasasDeApuestas::class)->find($idCasa);
    }

    public function getCampaignsUsers($idCamp){
        return $this->serializer->normalize($this->em->getRepository(CampaniasUsuario::class)->findBy(['idCampania'=>$idCamp, 'activo'=>1]));
    }

    public function getResponsables($idResp){
        return $this->em->getRepository(LoginAdmin::class)->find($idResp);
    }

    public function getCategory($idCat){
        return $this->em->getRepository(CategoriasCampania::class)->find($idCat);
    }

    public function getCategories(){
        return $this->em->getRepository(CategoriasCampania::class)->findAll();
    }

    public function getCodesNotUsed($idCampania){
        return $this->em->getRepository(CampaniasCodes::class)->findBy(['idcampania'=> $idCampania, 'idUsuario'=>NULL]);
    }

    public function prepareTable($camp){
        $array_camps = array();
        foreach($camp as $c){
            $casa = $this->getClients($c['idCasa']);
            $casanombre = '(DELETED)';
            $responsable = '';
            if(!empty($casa)){
                $casanombre = $casa->getTitcasa();
                $category = $this->getCategory($casa->getIdCat());
                $categoria = $category->getTitcat();
                $responsable = !empty($casa->getResponsable()) ? $this->getResponsables($casa->getResponsable()): '';
                $responsable = !empty($responsable)? $responsable->getUser(): '';
                $logo = !empty($casa->getImgcasa())? explode('/', $casa->getImgcasa()): array();
                $logo = end($logo);
            }

            $array_camps[] = array(
                'id' => $c['id'],
                'logo' => $logo,
                'titcamp' => $c['titcamp'],
                'idCasa' => $c['idCasa'],
                'casa' => $casanombre,
                'actcamp' => $c['actcamp'] ?? 0,
                'paises' => !empty($c['paises'])? strtoupper(join(',', $c['paises'])): 'none',
                'condiciones' => $c['condiciones'],
                'responsable' => $responsable,
                'comision' => $c['comisioncamp'],
                'currency' => $c['currency'],
                'tipo' => $c['tipo'],
                'usuarios_activos' =>count($this->getCampaignsUsers($c['id'])),
                'publica' => $c['campaniapublica'],
                'cateogria' => $categoria,
                'codes' => $c['tipo'] != 'auto' ? count($this->getCodesNotUsed($c['id'])): 'auto',
                'editUrl' => '/campaign/edit/'.$c['id'],
                'linkUrl' => '/campaign/link/'.$c['id']
            );
        }
//        echo '<pre>'.print_r($array_camps, true).'</pre>'; die();
        return $array_camps;

    }

    /**
     * @Route("/campaign/edit/{campania}", name="app_campaigns_edit")
     */
    public function editCampaign(Request $request): Response{

        $campaign_id = $request->get('campania');

        $campObj = $this->em->getRepository(Campanias::class)->find($campaign_id);
        $campaign = $this->serializer->normalize($campObj);
        $campaign['paisesTXT'] = strtoupper(join(',', $campaign['paises']));

        $iapuestasClients = $this->getIApuestas();

    //    echo '<pre>'.print_r($this->serializer->normalize($campObj), true).'</pre>'; die();
        if(!empty($campObj)){
            $form = $this->createFormBuilder($campObj)
                ->add('id', HiddenType::class)
                ->add('idCasa', ChoiceType::class, array('choices' => $this->getClientsSelector(), 'attr'=>array('class'=>'form-control  selectpicker'), 'label'=> 'Client'))
                ->add('paises', CountryType::class, array('attr'=>array('class' => 'form-control selectpicker ', 'multiple'=>true, 'data-live-search'=>true), 'label'=>'Country', 'required'=>true, "mapped"=>false))
                ->add('idiomaPrincipal', ChoiceType::class, array('choices'=> $this->getLanguages(), 'attr' => array('class'=>'form-control selectpicker' ),  'label' => 'Principal Language'))
                ->add('titcamp', TextType::class, array( 'label'=>'Campaign Title', 'attr'=>array('class'=>'form-control w-100')))
                ->add('condiciones', TextareaType::class , array( 'label'=>'Conditions', 'attr'=>array('class'=>'tinymce')))
                ->add('txtcamp', TextareaType::class , array( 'label'=>'Text Campaign', 'attr'=>array('class'=>'form-control txthtml')))
                ->add('titcampEn', TextType::class, array( 'label'=>'Eng. Title', 'attr'=>array('class'=>'form-control')))
                ->add('condicionesEn', TextareaType::class, array( 'label'=>'Eng. Conditions', 'attr'=>array('class'=>'form-control ')))
                ->add('txtcampEn', TextareaType::class , array( 'label'=>'Text Campaigns Eng.', 'attr'=>array('class'=>'form-control txthtml')))

                // ->add('contenidoEspecifico', TextareaType::class, array( 'label'=>'Specific Content', 'attr'=>array('class'=>'form-control txthtml')))
                // ->add('contenidoEspecificoDefecto',  TextareaType::class, array( 'label'=>'Specific Content Default', 'attr'=>array('class'=>'form-control txthtml')))
                ->add('comisioncamp', NumberType::class , array( 'label'=>'Commision', 'attr'=>array('class'=>'form-control')))
                ->add('currency', ChoiceType::class, array('choices'=>$this->getCurrencies(), 'attr' => array('class'=>'form-control selectpicker' ,  'label' => 'Currency')))
                ->add('responsable', ChoiceType::class, array('choices'=>$this->getResponsablesSelector(), 'attr' => array('class'=>'form-control selectpicker'  , 'label' => 'Responsible')))

                ->add('campaniapublica', ChoiceType::class, array('choices'=>array('Public'=> 1, 'Private'=>0),'attr' => array('class'=>'form-control selectpicker' ), 'label' => 'Public or Private'))
                ->add('tipo', ChoiceType::class, array('choices'=>array('Auto'=> 'auto', 'Manual'=>'manual'), 'label'=>'Type', 'attr' => array('class'=>'form-control selectpicker' )))
                ->add('connectionApi', ChoiceType::class, array( 'choices'=>$this->getConexionsApi(), 'label'=>'Api Connection', 'attr'=>array('class'=>'form-control selectpicker')))
                ->add('casaIapuestas', ChoiceType::class , array('choices'=> $this->getIApuestas(), 'label'=>'iApuestas Client', 'attr'=>array('class'=>'form-control selectpicker')))
                ->add('actcamp', ChoiceType::class , array('choices'=> array('Yes'=>1, 'No'=>0), 'label'=>'Active?', 'attr'=>array('class'=>'form-control mt-4 selectpicker')))
                ->add('esVip', ChoiceType::class , array( 'choices'=> array('Yes'=>1, 'No'=>0), 'label'=>'Vip?', 'attr'=>array('class'=>'form-control mt-4 selectpicker')))
                ->add('mostrarpublico',  ChoiceType::class, array('choices'=> array('Yes'=>1, 'No'=>0), 'label'=>'Show Public?', 'attr'=>array('class'=>'form-control mt-4 selectpicker')  ))
                ->add('txtlanding',  TextareaType::class, array( 'label'=>'Text Landing', 'attr'=>array('class'=>'form-control txthtml')))
                ->add('Edit_Campaign', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block m-5')))
                ->getForm();

            $condiciones_mejoradas = $this->getImprovingConditions($campObj);

            return $this->render('campaigns/edit.html.twig',
                [
                    'title' => $campObj->getTitcamp(),
                    'user' => $this->user,
                    'usersselector' => $this->getUsersSelector(),
                    'alerts' =>$this->getAlerts(10),
                    'form' => $form->createView(),
                    'responsables' => $this->getResponsablesAll(),
                    'categories' => $this->getCategories(),
                    'campaign' => $campaign,
                    'improvingConditions' => addslashes(json_encode($condiciones_mejoradas)),
                    'isNew' => 0

                ]
            );

        }
    }

    public function getIApuestas(){
        $iapuestas = $this->em->getRepository(CasasIapuestas::class)->findAll();
        $iapuestas_arr = array();
        $iapuestas_arr['Nothing'] = '';
        foreach($iapuestas as $item){
            $iapuestas_arr[$item->getNombreIapuestas()] = $item->getIdIapuestas();
        }
        return $iapuestas_arr;
    }

    public function getConexionsApi(){
        $conexions = $this->em->getRepository(ConexionesApi::class)->findAll();
        $conexions_arr= array();
        $conexions_arr['Not connection'] = '';
        foreach($conexions as $item){
            $conexions_arr[$item->getNombrePublico()] = $item->getNombreApi();
        }
        return $conexions_arr;
    }

    /**
     * @Route("/campaign/save", name="app_campaigns_save")
     */
    function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $newData = $request->get('newData') ?? $request->request->all();


        foreach($newData as $key => $val){
            if(is_array($val)){
                $newData[$key]= join(',',$val);
            }
        }
        $id =  $request->get('id')[0];


        $campObj = $doctrine->getRepository(Campanias::class)->find($id);
        if(empty($campObj) or !$this->checkRealId($id)){
            $campObj = new Campanias();
        }

        if(isset($newData['titcamp'])) $campObj->setTitcamp($newData['titcamp']);
        if(isset($newData['idCasa'])) $campObj->setIdCasa($newData['idCasa']);
        if(isset($newData['condiciones'])) $campObj->setCondiciones($newData['condiciones']);
        if(isset($newData['titcampEn'])) $campObj->setTitcampEn($newData['titcampEn']);
        if(isset($newData['condicionesEn'])) $campObj->setCondicionesEn($newData['condicionesEn']);
        if(isset($newData['responsable'])) $campObj->setResponsable($newData['responsable']);
        if(isset($newData['comisioncamp'])) $campObj->setComisioncamp($newData['comisioncamp']);
        if(isset($newData['currency'])) $campObj->setCurrency($newData['currency']);
        if(isset($newData['campaniapublica'])) $campObj->setCampaniapublica($newData['campaniapublica']);
        if(isset($newData['tipo'])) $campObj->setTipo($newData['tipo']);
        if(isset($newData['paises'])) $campObj->setPaises(explode(',',$newData['paises']));
        if(isset($newData['idiomaPrincipal'])) $campObj->setIdiomaPrincipal($newData['idiomaPrincipal']);
        if(isset($newData['connectionApi'])) $campObj->setConnectionApi($newData['connectionApi']);
        if(isset($newData['casaIapuestas'])) $campObj->setCasaIapuestas($newData['casaIapuestas']);
        if(isset($newData['actcamp'])) $campObj->setActcamp($newData['actcamp'] == '1' ? true : false);
        if(isset($newData['esVip'])) $campObj->setEsVip($newData['esVip']);
        if(isset($newData['mostrarpublico'])) $campObj->setMostrarpublico($newData['mostrarpublico']);
        if(isset($newData['txtcamp'])) $campObj->setTxtcamp($newData['txtcamp']);
        if(isset($newData['txtcampEn'])) $campObj->setTxtcampEn($newData['txtcampEn']);
        if(isset($newData['txtlanding'])) $campObj->setTxtlanding($newData['txtlanding']);


        $doctrine->getManager()->persist($campObj);
        $doctrine->getManager()->flush();
        $data = $this->serializer->normalize($campObj);
        $data['id'] = $campObj->getId();

        return $this->json(array('success'=> 1, 'msg'=> 'campaigns saved', 'data'=>$data));
    }

    public function getImprovingConditions($campObj){
        $condiciones_mejoradas = array();
        $campUserObj = $this->em->getRepository(CampaniasUsuario::class)->findBy(['idCampania'=>$campObj->getId()]);
        $campMejorada_arr = array();
        foreach($campUserObj as $item){
            $campMejorada_arr[$item->getIdUsuario()] = $item;
        }

        $user = $this->em->getRepository(LoginBusiness::class)->findBy(['activo'=>1]);
        foreach($user as $item){
            if(!empty($campMejorada_arr[$item->getId()])){
                $condiciones_mejoradas[] = array(
                    'iduser' => $item->getId(),
                    'user' => $item->getUser(),
                    'username' => $item->getUsername(),
                    'commision' => $campObj->getComisioncamp(),
                    'conditions' => $campObj->getCondiciones(),
                    'campaniaactiva' => $campMejorada_arr[$item->getId()]->getActivo(),
                    'asked' => $campMejorada_arr[$item->getId()]->getSolicitada(),
                    'idusercamp' => $campMejorada_arr[$item->getId()]->getIdCampaniaUsuario(),
                    'comisionVip' => $campMejorada_arr[$item->getId()]->getComisionVip(),
                    'condicionesVip' =>$campMejorada_arr[$item->getId()]->getCondicionesVip(),
                );
            }else{
                $condiciones_mejoradas[] = array(
                    'iduser' => $item->getId(),
                    'user' => $item->getUser(),
                    'username' => $item->getUsername(),
                    'commision' => $campObj->getComisioncamp(),
                    'conditions' => $campObj->getCondiciones(),
                    'campaniaactiva' => false,
                    'asked' => false,
                    'idusercamp' => 0,
                    'comisionVip' => NULL,
                    'condicionesVip' =>NULL,
                );
            }

        }
        return $condiciones_mejoradas;
    }

    /**
     * @Route("/campaign/conditions/save", name="app_campaigns_conditions_save")
     */
    public function saveConditions(ManagerRegistry $doctrine, Request $request){
        $url_camp_array = explode('/', $request->headers->get('referer'));
        $id_camp = end($url_camp_array);
        $campEnlacesObj = $this->em->getRepository(CampaniasEnlace::class)->findOneBy(['idCampania'=>$id_camp, 'numeroEnlace'=> 1]);

        $newData = $request->request->get('newData');
        $id = $request->request->get('id');
        // INSERT INTO campanias_usuario (id_usuario, id_campania, fecha_alta, url_inicial, condiciones_vip, comision_vip, activo, es_privada, condiciones_mejoradas) VALUES (".$value[2].", ".$idcamp.", '".$fecha."', '".$row['url_inicial']."', '".$condiciones[1]."', ".$comision[1].", 1, 1, 1)";
        $campUserObj = $this->em->getRepository(CampaniasUsuario::class)->findOneBy(['idCampania' => $id_camp, 'idUsuario' => $id]);
        if(empty($campUserObj)){
            $campUserObj = new CampaniasUsuario();
            $campUserObj->setIdUsuario($id);
            $campUserObj->setIdCampania($id_camp);
            $fecha = date('Y-m-d H:i:s');
            $campUserObj->setFechaAlta($fecha);
            $campUserObj->setUrlInicial($campEnlacesObj->getUrlInicial());
            $campUserObj->setComisionVip($newData['comisionVip'] ?? NULL);
            $campUserObj->setCondicionesVip($newData['condicionesVip'] ?? NULL);
            $campUserObj->setCondicionesMejoradas(true);
            $campUserObj->setEsPrivada(true);
            $campUserObj->setActivo(true);
        }else{
            $campUserObj->setCondicionesVip($newData['condicionesVip'] ?? NULL);
            $campUserObj->setCondicionesMejoradas(true);
        }
        $this->em->getManager()->persist($campUserObj);
        $this->em->getManager()->flush();

        return $this->json(array('success'=>1, 'msg'=> 'new conditions saved'));

        //echo '<pre>'.print_r($this->serializer->normalize($request), true).'</pre>';
    }


    /**
     * @Route("/campaign/link/{campania}", name="app_campaigns_link")
     */
    public function campaignsLink(Request $request): Response{

        $project = 0;  // = betandeal (by default)
        // $project = 2 = iapuestas

        if(empty($this->userToken)){
            return $this->redirect('/login');
        }
        $id_campania = $request->get('campania');
        $campObj = $this->em->getRepository(Campanias::class)->find($id_campania);
        $campArr =  $this->serializer->normalize($campObj);
        $campEnlacesArr = $this->serializer->normalize($this->em->getRepository(CampaniasEnlace::class)->findBy(['idCampania'=>$id_campania]));
        $codes = $this->serializer->normalize($this->getCodesByCampaign($id_campania, $project));
        $users = $this->getUsersSelector();
        $alerts = $this->getAlerts(10);

        $form = $this->createFormBuilder($campObj)
            ->add('id', HiddenType::class)
            ->add('titcamp', TextType::class , array( 'label'=>'Title', 'attr'=>array('class'=>'form-control', 'disabled'=>'disabled')))
            ->add('titcampEn', TextType::class, array( 'label'=>'Eng. Title', 'attr'=>array('class'=>'form-control','disabled'=>'disabled')))
            ->add('tipo', TextType::class, array( 'label'=>'Type', 'attr'=>array('class'=>'form-control','disabled'=>'disabled')))
            ->add('uri_enlaces',  TextType::class, array( 'label'=>'Links uri', 'attr'=>array('class'=>'form-control', 'pattern'=>'[A-Za-z0-9]{3,150}', 'required'=>'required')))
            ->add('Save_url', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block m-5')))
            ->getForm();



        $formUpload = $this->getFormUpload();


      return $this->render('campaigns/link.html.twig',
            [
                'title' => 'Campaign Links',
                'user' => $this->user,
                'usersselector' => $users,
                'alerts' =>$alerts,
                'campaign' => $campArr,
                'links' => addslashes(json_encode($campEnlacesArr)),
                'form' => $form->createView(),
                'codes' => json_encode($codes),
                'isAuto' => $campObj->getTipo() == 'auto' ? 1: 0,
                'users' => addslashes(json_encode($users)),
                'uploadForm'=> $formUpload->createView(),

            ]
        );
    }

    public function getFormUpload(){
        $formUpload = $this->createFormBuilder()
            ->add('file', FileType::class, array('attr'=>array('class' => 'form-control '), 'label' => 'Codes (CSV file)', 'mapped'=>false, 'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'application/csv',
                    ],
                    'mimeTypesMessage' => 'Please upload a valid CSV document',
                ])
            ]))
            ->add('upload_codes', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();

        return $formUpload;
    }


    /**
     * @Route("/campaign/links/save", name="app_campaigns_link_save")
     */
    public function saveLink(Request $request, ManagerRegistry $doctrine){
        $newData = $request->request->get('newData');
        $id = $request->request->get('id');
        $linkObj = $this->em->getRepository(CampaniasEnlace::class)->find($id);
        if(!$this->checkRealId($id)){
            $linkObj = new CampaniasEnlace();
            $url_camp_array = explode('/', $request->headers->get('referer'));
            $id_camp = end($url_camp_array);
            $linkObj->setIdCampania($id_camp);
            $linksPerCampaign = $this->em->getRepository(CampaniasEnlace::class)->findOneBy(['idCampania'=>$id_camp], ['numeroEnlace' => 'desc']);
            $linkObj->setNumeroEnlace($linksPerCampaign->getNumeroEnlace()+1);

        }


        if(isset($newData['textoEs'])) {
            $linkObj->setTextoEs($newData['textoEs']);
        }

        if(isset($newData['textoEn'])) {
            $linkObj->setTextoEn($newData['textoEn']);
        }

        if(isset($newData['urlInicial'])) {
            $linkObj->setUrlInicial($newData['urlInicial']);
        }

        if(isset($newData['activo'])) {
            $active = $newData['activo'] == 0 || $newData['activo'] == 'false' ? false: true;
            $linkObj->setActivo($active);
        }

        $doctrine->getManager()->persist($linkObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=> 'link saved', 'data'=>$linkObj));
    }


    /**
     * @Route("/campaign/linksinfo/save", name="app_campaigns_linkinfo_save")
     */
    public function saveUrlLink(Request $request, ManagerRegistry $doctrine): Response{
        $url_camp_array = explode('/', $request->headers->get('referer'));
        $id_camp = end($url_camp_array);
        $url = $request->get('uri_enlaces');

        $campObj = $this->em->getRepository(Campanias::class)->find($id_camp);
        if(!empty($campObj)){
            $campObj->setUriEnlaces($url[0]);
            $doctrine->getManager()->persist($campObj);
            $doctrine->getManager()->flush();
            return $this->json(array('success'=>1, 'msg' => 'Url Saved', 'data'=>''));
        }
        return $this->json(array('success'=>0, 'msg' => 'Campaign not found', 'error'=>'not found'));

    }

    /**
     * @Route("/campaign/links/sync", name="app_campaigns_links_sync")
    */
    public function sync(Request $request, ManagerRegistry $doctrine){
        $url_camp_array = explode('/', $request->headers->get('referer'));
        $id_camp = end($url_camp_array);
        $this->getAllInfo($id_camp);
        return $this->json(array('success'=> 1, 'msg'=>'Syncronized', 'data'=>array()));
    }

    private function getAllInfo($id){
        $conn = $this->em->getConnection();
        $sql = 'SELECT *,campanias_usuario.id_usuario as id_user FROM campanias_usuario LEFT JOIN campanias ON campanias.id = campanias_usuario.id_campania LEFT JOIN campanias_codes ON campanias_usuario.id_campania_usuario = campanias_codes.id_usuario LEFT JOIN casas_de_apuestas ON campanias_codes.idcasa = casas_de_apuestas.id_casa LEFT JOIN login_business ON campanias_usuario.id_usuario = login_business.id WHERE id_campania = '.$id;
        $stmt = $conn->prepare($sql);
        $data = $stmt->execute()->fetchAll();

        $links = $this->serializer->normalize($this->em->getRepository(CampaniasEnlace::class)->findBy(['idCampania'=>$id]));
        if(!empty($links)){
            foreach ($data as $item){
                if(empty($item['id_user'])) continue;
                $nombre = str_replace(' ', '', $item['uri_enlaces']);
                $urlfinal = array();
                $urlcorta = array();
                foreach ($links as $key => $enlace) {
                    $int = (int)$key+1;
                    $urlfinal[] = str_replace(array("VARXXXX","XXXX"), $item['codigo'], $enlace['urlInicial']);
                    $urlcorta[] = "https://bdeal.io/".$nombre."/".$item['id_campania_usuario']."/".$int;
                }
                $campUsuObj = $this->em->getRepository(CampaniasUsuario::class)->find($item['id_campania_usuario']);
                if(!empty($item['campaniapublica'])){
                    $campUsuObj->setUrlCortas(json_encode($urlcorta));
                    $campUsuObj->setUrlAutomaticas(json_encode($urlfinal));
                    $campUsuObj->setActivo(true);
                    $this->em->getManager()->persist($campUsuObj);
                    $this->em->getManager()->flush();
                    $done = $this->em->getManager()->contains($campUsuObj);
                }
                elseif ($item['campaniapublica'] == 0 && $item['pendiente'] == 0 && $item['activo'] == 0){
                    continue;
                }else{
                    $campUsuObj->setUrlsCortas(json_encode($urlcorta));
                    $campUsuObj->setUrlsAutomaticas(json_encode($urlfinal));
                    $this->em->getManager()->persist($campUsuObj);
                    $this->em->getManager()->flush();
                    $done = $this->em->getManager()->contains($campUsuObj);
                }

                if(!empty($done)){
                    if(!empty($item['pendiente'])){
                    $campCodesObj = $this->em->getRepository(CampaniasCodes::class)->findOneBy(['idcampania' => $id, 'activo'=> 0, 'project'=> 0]);

                        if(!empty($campCodesObj)) {

                                $campCodesObj->setIdUsuario($item['id_campania_usuario']);
                                $campCodesObj->setUsername($item['username']);
                                $campCodesObj->setActivo(true);
                                $this->em->getManager()->persist($campCodesObj);
                                $this->em->getManager()->flush();
                                $urlfinal = array();
                                foreach ($links as $key => $enlace) {
                                    $urlfinal[] = str_replace(array("VARXXXX","XXXX"), $campCodesObj->getCodigo(), $enlace['urlInicial']);
                                }
                                $campUsuObj = $this->em->getRepository(CampaniasUsuario::class)->find($item['id_campania_usuario']);
                                $campUsuObj->setPendiente(false);
                                $campUsuObj->setActivo(true);
                                $campUsuObj->setUrlAutomaticas(json_encode($urlfinal));
                                $this->em->getManager()->persist($campUsuObj);
                                $this->em->getManager()->flush();
                        }
                    }
                }
            }
        }
    }

    public function getCodesByCampaign($id, $project = 0){
        return $this->em->getRepository(CampaniasCodes::class)->findBy(['idcampania'=> $id, 'project' => $project]);
    }

    /**
     * @Route("/campaign/codes/save", name="app_campaigns_codes_save")
     */

    public function saveCodes(Request $request, ManagerRegistry $doctrine): Response{

        $url_camp_array = explode('/', $request->headers->get('referer'));
        $id_camp = end($url_camp_array);

        $newData = $request->request->get('newData');
        $id = $request->request->get('id');

        $campCodeObj= $this->em->getRepository(CampaniasCodes::class)->find($id);
        if(!$this->checkRealId($id)){
            $campCodeObj = new CampaniasCodes();
        }
        if(isset($newData['activo'])){
            $active = ($newData['activo'] == 'false' ||$newData['activo'] = 0) ? false:true;
            $campCodeObj->setActivo($active);
        }

        if(isset($newData['idcasa'])){
            $campCodeObj->setIdcasa($newData['idcasa']);
        }

        if(isset($newData['idcampania'])){
            $campCodeObj->setIdcampania($newData['idcampania']);
        }

        if(isset($newData['codigo'])){
            $campCodeObj->setCodigo($newData['codigo']);
        }

        if(isset($newData['idUsuario'])){
            $campCodeObj->setIdUsuario($newData['idUsuario']);
        }

        if(isset($newData['username'])){
            $campCodeObj->setUsername($newData['username']);
        }

        if(isset($newData['project'])){
            $campCodeObj->setProject($newData['project']);
        }

        $doctrine->getManager()->persist($campCodeObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=>1, 'msg'=>'Code Saved', 'data' =>$campCodeObj));
    }

    /**
     * @Route("/campaigns/upload/codes", name="app_campaigns_upload_codes")
     */

    public function uploadCodes(FileUploader $file, Request $request , ManagerRegistry $doctrine): Response{
        if(!empty($request->files->get('form')['file'])){
            $uploadedFile = $request->files->get('form')['file'];
            $allowed_extension = 'csv';
            $fileExtension = explode('.', $uploadedFile->getClientOriginalName());

            if(!in_array($allowed_extension, $fileExtension)) {
                return $this->json(array('success'=>0, 'msg'=>'Invalid format file'));
            }

            $codes = $file->upload($uploadedFile, self::CSV_FOLDER);
            return $this->json(array('success'=>1, 'msg'=>'File uploaded', 'file'=>$codes, 'data'=>$this->readFile($file->getuploadPath().'/'.self::CSV_FOLDER.'/'.$codes)));
        }
        return $this->json(array('success'=>0, 'msg'=>'File not uploaded'));
    }

    public function readFile($file){
        $csv = array_map(function($v){return str_getcsv($v, ";");}, file($file));
        $csv_returned = array();
        foreach($csv as $item){
            $csv_returned[]= array('code'=> $item[0]);
        }
        return $csv_returned;

    }

    /**
     * @Route("/campaigns/save/codes", name="app_campaigns_save_codes")
     */
    public function saveCodesUploaded(Request  $request, ManagerRegistry $doctrine){
        $url_camp_array = explode('/', $request->headers->get('referer'));
        $id_camp = end($url_camp_array);
        $campObj = $this->em->getRepository(Campanias::class)->find($id_camp);
        $codes = $request->get('codes');

        foreach($codes as $code){
            $codeObj = new CampaniasCodes();
            $codeObj->setCodigo($code['code']);
            $codeObj->setIdcampania($id_camp);
            $codeObj->setIdcasa($campObj->getIdcasa());
            $doctrine->getManager()->persist($codeObj);
            $doctrine->getManager()->flush();
        }
        return $this->json(array('success'=> 1, 'msg'=>'Codes uploaded', 'data'=>$codes));
    }


}
