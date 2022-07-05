<?php

namespace App\Controller;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasUsuario;
use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\CategoriasCampania;
use App\Entity\Main\EstadisticasApi;
use App\Entity\Main\LoginBusiness;
use App\Lib\Roles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Doctrine\Persistence\ManagerRegistry;
use MongoDB\Driver\Manager;
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
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\Choice;

class CampaignsUsersController extends AbstractController
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

            /* control de accesos (view)*/
            $this->perms = new Roles($this->userToken, $doctrine);
            $this->access = $this->perms->checkAccess();
            $this->actionsLocked = $this->access['actions'];
            if(!empty($this->access['uri'])){
                $this->redirectToHome();
            }
            /* fin control de accesos */

        }
    }

    /**
     * @Route("/campaigns/list-active", name="app_campaigns_list_active")
     */
    public function index(): Response
    {
        if(empty($this->userToken)){
            return $this->redirect('/login');
        }

        $filterform = $this->createFilterForm();
        $alerts = $this->getAlerts(10);

        return $this->render('campaigns_users/index.html.twig',
            [
                'title' => 'Active Campaigns',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'formfilter'=>$filterform->createView(),
                /*'campaigns' => addslashes(json_encode($array_camps)),
                'responsables' => addslashes(json_encode($this->getResponsablesAll()))*/
                'actionsLocked' => json_encode($this->actionsLocked)
            ]
        );
    }

    private function createFilterForm(){
        $users = $this->getAllUsers();

        foreach($users as $user){
            $users_search[$user['user']] = $user['id'];
        }

        $form = $this->createFormBuilder()
            ->add('status', ChoiceType::class , array('choices'=> array( 'Approved'=>1, 'Not Approved'=>2, 'Pending'=>3), 'label'=>'Request Status', 'attr'=>array('class'=>'form-control  selectpicker',  'multiple'=>'multiple', 'data-actions-box'=>'data-actions-box')))
            ->add('client', ChoiceType::class, array('choices' => $this->getClientsSelector(), 'attr'=>array('class'=>'form-control  selectpicker', 'data-live-search'=>true, 'multiple'=>'multiple', 'data-actions-box'=>'data-actions-box'), 'label'=> 'Client', 'mapped'=>false))
            ->add('countries', CountryType::class, array('attr'=>array('class' => 'form-control selectpicker ', 'multiple'=>true, 'data-live-search'=>true , 'multiple'=>'multiple', 'data-actions-box'=>'data-actions-box'), 'label'=>'Country', 'required'=>true, "mapped"=>false))
            ->add('users', ChoiceType::class, array('choices'=>$users_search, 'attr' => array('class'=>'form-control selectpicker', 'data-live-search'=>true , 'multiple'=>'multiple', 'data-actions-box'=>'data-actions-box') , 'label' => 'Users'))
            ->add('categories', ChoiceType::class, array('choices'=>$this->getCategories(),'attr' => array('class'=>'form-control selectpicker', 'multiple'=>'multiple' , 'data-actions-box'=>'data-actions-box'), 'label' => 'Category'))
            ->add('Filter', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block m-5')))
            ->getForm();
        return $form;
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
     * @Route("/activecampaigns/filter", name="app_campaigns_active_filter")
     */
    public function FilterActiveCampaigns(Request $request){

        $status =$request->request->get('status');
        $client =$request->request->get('client');
        $countries =$request->request->get('countries');
        $users =$request->request->get('users');
        $category =$request->request->get('categories');

        $findBy = array();
        if(!empty($users)){
            $findBy['idUsuario'] = $users;
        }
        if(!empty($status)){
            if(in_array(3, $status)){
                $findBy['pendiente'][] = 1;
                $findBy['solicitada'][] = 1;
                $findBy['activo'][] = 0;
            }
            if(in_array(2, $status)){
                $findBy['pendiente'][] = 0;
                $findBy['solicitada'][] = 1;
                $findBy['activo'][] = 0;
            }
            if(in_array(1, $status)){
                $findBy['pendiente'][] = 0;
                $findBy['solicitada'][] = 1;
                $findBy['activo'][] = 1;
            }
        }
        $campUsu  = $this->serializer->normalize($this->em->getRepository(CampaniasUsuario::class)->findBy($findBy));
        $campsConstructor = array();
        foreach($campUsu as $item){
            $userObj = $this->em->getRepository(LoginBusiness::class)->find($item['idUsuario']);
            if(empty($userObj)) continue;
            $campObj = $this->em->getRepository(Campanias::class)->find($item['idCampania']);
            if(empty($campObj)) continue;
            $casaObj = $this->em->getRepository(CasasDeApuestas::class)->find($campObj->getIdCasa());
            if(empty($casaObj)) continue;
            $catObj = $this->em->getRepository(CategoriasCampania::class)->find($casaObj->getidCat());
            if(empty($catObj)) continue;
            if(!empty($client)) {
                if (in_array($campObj->getIdCasa(), $client)) {
                    //  var_export($campObj); die();

                    if (!empty($countries)) {
                        foreach ($campObj->getPaises() as $country) {
                            if (in_array(strtoupper($country), $countries)) {
                                $campsConstructor[$item['idCampaniaUsuario']] = $item;
                                $campsConstructor[$item['idCampaniaUsuario']]['countries'] = $campObj->getPaises() ?? array();
                                $campsConstructor[$item['idCampaniaUsuario']]['client'] = $casaObj->getTitcasa();
                                $campsConstructor[$item['idCampaniaUsuario']]['client_logo'] = $casaObj->getImgcasa();
                                $campsConstructor[$item['idCampaniaUsuario']]['category'] = $catObj->getTitcat();
                                $campsConstructor[$item['idCampaniaUsuario']]['user'] = $userObj->getUser();

                            }
                        }
                    } else {
                        $campsConstructor[$item['idCampaniaUsuario']] = $item;
                        $campsConstructor[$item['idCampaniaUsuario']]['countries'] = $campObj->getPaises()?? array();
                        $campsConstructor[$item['idCampaniaUsuario']]['client'] = $casaObj->getTitcasa();
                        $campsConstructor[$item['idCampaniaUsuario']]['client_logo'] = $casaObj->getImgcasa();
                        $campsConstructor[$item['idCampaniaUsuario']]['category'] = $catObj->getTitcat();
                        $campsConstructor[$item['idCampaniaUsuario']]['user'] = $userObj->getUser();
                    }
                }
            }else{
                if (!empty($countries)) {
                    if(empty($campObj->getPaises())) $campObj->setPaises(array());
                    foreach ($campObj->getPaises() as $country) {
                        if (in_array(strtoupper($country), $countries)) {
                            $campsConstructor[$item['idCampaniaUsuario']] = $item;
                            $campsConstructor[$item['idCampaniaUsuario']]['countries'] = $campObj->getPaises()?? array();
                            $campsConstructor[$item['idCampaniaUsuario']]['client'] = $casaObj->getTitcasa();
                            $campsConstructor[$item['idCampaniaUsuario']]['client_logo'] = $casaObj->getImgcasa();
                            $campsConstructor[$item['idCampaniaUsuario']]['category'] = $catObj->getTitcat();
                            $campsConstructor[$item['idCampaniaUsuario']]['user'] = $userObj->getUser();

                        }
                    }
                } else {
                    $campsConstructor[$item['idCampaniaUsuario']] = $item;
                    $campsConstructor[$item['idCampaniaUsuario']]['countries'] = $campObj->getPaises()?? array();
                    $campsConstructor[$item['idCampaniaUsuario']]['client'] = $casaObj->getTitcasa();
                    $campsConstructor[$item['idCampaniaUsuario']]['client_logo'] = $casaObj->getImgcasa();
                    $campsConstructor[$item['idCampaniaUsuario']]['category'] = $catObj->getTitcat();
                    $campsConstructor[$item['idCampaniaUsuario']]['user'] = $userObj->getUser();
                }
            }
        }
        $campaigns_returned = array();
        foreach($campsConstructor as $key => $campaign){
            $campaign['editUrl']  = '/activecampaigns/edit/'.$key;
            if(!empty($category)){
                if(in_array($campaign['category'], $category)){

                    $campaigns_returned[] = $campaign;

                }
            }else{
                $campaigns_returned[] = $campaign;
            }
        }
        return $this->json(array('success'=> 1, 'msg'=> 'found campaigns', 'data'=> $campaigns_returned));
    }

    /**
     * @Route("activecampaigns/edit/{campania}", name="app_campaigns_user_edit")
     */
    public function editCampaignUsuario(Request $request): Response{


            $campaign_id = $request->get('campania');

            $campUsuObj = $this->em->getRepository(CampaniasUsuario::class)->find($campaign_id);
            $userObj = $this->em->getRepository(LoginBusiness::class)->find($campUsuObj->getIdUsuario());
            $campObj= $this->em->getRepository(Campanias::class)->find($campUsuObj->getIdCampania());
            $statsObj = $this->em->getRepository(EstadisticasApi::class)->findBy(['idCampaniaUsuario'=> $campaign_id], ['fecha'=>'desc']);
            if(empty($campUsuObj)) die('campaña no existe');

            $form = $this->createFormBuilder($campUsuObj)
                ->add('idCampaniaUsuario', TextType::class , array( 'label'=>'Id Campaign User', 'attr' => array('class' => 'form-control' , 'disabled'=>'disabled'), ))
                ->add('titcamp', TextType::class , array('mapped' => false, 'label'=>'Campaign Title', 'attr' => array('class' => 'form-control' , 'disabled'=>'disabled', 'value'=>$campObj->getTitcamp()), ))
                ->add('iduser', TextType::class , array('mapped' => false, 'label'=>'Id User', 'attr' => array('class' => 'form-control' , 'disabled'=>'disabled', 'value'=>$userObj->getId()), ))
                ->add('user', TextType::class , array('mapped' => false, 'label'=>'Username', 'attr' => array('class' => 'form-control' , 'disabled'=>'disabled', 'value'=>$userObj->getUsername()), ))
                ->add('comisionVip', TextType::class , array( 'label'=>'Commision (€)', 'attr' => array('class' => 'form-control' , 'disabled'=>'disabled') ))
                ->add('condicionesVip', TextType::class , array( 'label'=>'Conditions', 'attr' => array('class' => 'form-control' , 'disabled'=>'disabled', 'value'=>empty($campUsuObj->getCondicionesVip()) ? $campObj->getCondiciones() :$campUsuObj->getCondicionesVip()) ))
                ->add('activo', ChoiceType::class , array('choices'=> array('Active'=>1, 'Not Active'=>0), 'label'=>'Active?', 'attr'=>array('class'=>'form-control mt-4 selectpicker')))
                ->getForm();

/*            var_export($statsObj);

            var_export($userObj);

            var_export($campUsuObj);*/

            $linksInfo = $this->prepareLinksInfo($campUsuObj);

            return $this->render('campaigns_users/edit.html.twig',
                [
                    'title' => $campObj->getTitcamp(). ' - '. $userObj->getUser(),
                    'user' => $this->user,
                    'usersselector' => $this->getUsersSelector(),
                    'alerts' =>$this->getAlerts(10),
                    'form' => $form->createView(),
                    'linksInfo' => addslashes(json_encode($linksInfo)),
                    'stats' => addslashes(json_encode($this->serializer->normalize($statsObj))),
                ]
            );
    }

    /**
     * @Route("/activecampaigns/change/status", name="app_campaigns_user_change_status")
     */
    public function changeStatusCampaign(Request $request): Response{

        $newStatus = $request->request->get('status');
        $url_camp_array = explode('/', $request->headers->get('referer'));
        $id_camp = end($url_camp_array);

        $campUsuObj = $this->em->getRepository(CampaniasUsuario::class)->find($id_camp);
        if(!empty($campUsuObj)) $campUsuObj->setActivo($newStatus);
        $this->em->getManager()->persist($campUsuObj);
        $this->em->getManager()->flush();

        return $this->json(array('success'=>1, 'msg'=> 'Status changed', 'data'=> ''));
    }

    private function prepareLinksInfo($campUsuObj){
        $LinksCamp  = $campUsuObj->getUrlCortas();
        $LinksAutoCamp  = $campUsuObj->getUrlAutomaticas();
        $linksArray = json_decode($LinksCamp, true);
        $linksAutoArray = json_decode($LinksAutoCamp, true);
        $links_returned = array();
        $x = 0;
        if(!empty($linksArray)) {
            foreach ($linksArray as $link) {
                $links_returned[] = array(
                    'id' => $x + 1,
                    'fecha' => $campUsuObj->getFechaAlta(),
                    'urlInicial' => $campUsuObj->getUrlInicial(),
                    'urlCorta' => $link,
                    'urlAuto' => $linksAutoArray[$x]
                );
                $x++;
            }
        }
        return ($links_returned);

    }

    /**
     * @Route("/activecampaign/stats/save", name="app_campaigns_user_stats_save")
     */
    public function saveStats(Request $request): Response{
        $newData = $request->request->get('newData');
        $id = $request->request->get('id');

        $statsObj = $this->em->getRepository(EstadisticasApi::class)->find($id);
        if(!empty($statsObj)){
            if(isset($newData['clicksTotales'])){
                $statsObj->setClicksTotales($newData['clicksTotales']);
            }

            if(isset($newData['clicksUnicos'])){
                $statsObj->setClicksUnicos($newData['clicksUnicos']);
            }

            if(isset($newData['comisionGenerada'])){
                $statsObj->setComisionGenerada($newData['comisionGenerada']);
            }

            if(isset($newData['connectionId'])){
                $statsObj->setConnectionId($newData['connectionId']);
            }

            if(isset($newData['cpaGenerados'])){
                $statsObj->setCpaGenerados($newData['cpaGenerados']);
            }

            if(isset($newData['depositantesPrimeraVez'])){
                $statsObj->setDepositantesPrimeraVez($newData['depositantesPrimeraVez']);
            }

            if(isset($newData['fecha'])){
                $statsObj->setFecha($newData['fecha']);
            }

            if(isset($newData['fuenteMarketing'])){
                $statsObj->setFuenteMarketing($newData['fuenteMarketing']);
            }

            if(isset($newData['idCampaniaUsuario'])){
                $statsObj->setIdCampaniaUsuario($newData['idCampaniaUsuario']);
            }

            if(isset($newData['registros'])){
                $statsObj->setRegistros($newData['registros']);
            }
            $this->em->getManager()->persist($statsObj);
            $this->em->getManager()->flush();
        }

        return $this->json(array('success'=>1, 'msg'=>'Stats saved', 'data'=>array()));
    }
}
