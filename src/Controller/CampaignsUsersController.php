<?php

namespace App\Controller;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasUsuario;
use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\CategoriasCampania;
use App\Entity\Main\LoginBusiness;
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
            $campaign['editUrl']  = '/campaignactive/edit/'.$key;
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
}
