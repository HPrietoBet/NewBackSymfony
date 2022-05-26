<?php

namespace App\Controller;

use App\Entity\Main\CampaniasUsuario;
use App\Entity\Main\CampaniasUsuarioClicks;
use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\Country;
use App\Entity\Main\EstadisticasApi;
use App\Entity\Main\LoginAdmin;
use App\Entity\Main\LoginBusiness;
use App\Entity\Main\Campanias;
use App\Entity\Premiumpay\PasarelaBetandealPaymentdata;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class StatsController extends AbstractController
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
        $this->user = $this->userToken->getUser();
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/stats/users", name="app_stats_user")
     */
    public function index(): Response
    {

        // CHEQUEO LOGADO DE USUARIO //
        if (empty($this->userToken)) {
            return $this->redirectToRoute('login');
        }

        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        $statsEntity = new EstadisticasApi();

        $users = $this->getAllUsers();
        $ids = array_column($users, 'id');
        $ids_search = array();
        foreach ($ids as $id) {
            $ids_search[$id] = $id;
        }
        $usernames = array_column($users, 'username');
        $users_search = array();
        foreach ($usernames as $user) {
            $users_search[$user] = $user;
        }

        $filterform = $this->createFormBuilder($statsEntity)
            ->add('fecha',  DateType::class, [
                'widget'=>'single_text',
                'html5'=>false,
                'attr'=>['class'=>'js-datepicker from', 'data-date-start-date'=>date('Y-m-01'), 'data-date-end-date'=>date('Y-m-d'), 'value'=>date('Y-m-01') .' - '. date('Y-m-d')],
                'format'=>'yyyy-mm-dd',
                'label'=>'Dates',
                'row_attr'=>[
                    'class'=>'input-daterange from'
                ]
            ])
            ->add('fecha_b',  DateType::class, [
                'widget'=>'single_text',
                'html5'=>false,
                'attr'=>['class'=>'js-datepicker comparation', 'data-date-start-date'=>date('Y-m-01', strtotime(date('Y-m-01'). ' -1 month')), 'data-date-end-date'=>date('Y-m-d', strtotime(date('Y-m-d'). ' -1 month')), 'value'=>date('Y-m-01', strtotime(date('Y-m-01'). ' -1 month')) .' - '. date('Y-m-d', strtotime(date('Y-m-d'). ' -1 month'))],
                'format'=>'yyyy-mm-dd',
                'label'=>'Dates Compare',
                "mapped" => false,
                'row_attr'=>[
                    'class'=>'input-daterange  comparation compare hide'
                ]
            ])
            ->add('compare', CheckboxType::class, ["mapped"=>false, "attr"=>['class' =>"activeCompare"]])
            ->add('users', ChoiceType::class, array('choices' => $users_search, 'attr' => array('class' => 'form-control selectpicker', 'multiple' => true, 'data-live-search' => true, 'data-actions-box' => true, 'expanded' => true), 'label' => 'Username', "mapped" => false))
            ->add('search_stats', SubmitType::class, array('attr' => array('class' => 'btn-primary btn-block', 'data-search' => 'users')))
            ->getForm();

        $data = array();

        return $this->render('stats/index.html.twig',
            [
                'title' => 'Affiliates Stats',
                'user' => $this->user,
                'alerts' => $alerts,
                'data' => json_encode($data),
                'formfilter' => $filterform->createView(),
                'responsables' => json_encode($this->getResponsables())

            ]
        );
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
     * @Route("/stats/users/get", name="app_stats_user_get")
     */
    public function statsUsers(Request $request)
    {
        $data = $request->request->all();
        $dates =  explode(' - ',$data['data']['fecha'][0]);
        $users =  $data['data']['users'];


        $users_data = $this->em->getRepository(LoginBusiness::class)->getInfoStats($users);

        $dates_b = array();
        if(!empty($data['data']['compare'])){
            $dates_b =  explode(' - ',$data['data']['fecha_b'][0]);
        }

        $users_return = array();
        foreach($users_data as $user){
            $dataStats = $this->getUserData($user['id'], $dates);
            $dataPPay = $this->getUserPpay($user['id'], $dates);

            $dataStatsB = array(
                'registros' => 0,
                'comisiones' =>0,
                'depositantes' =>0,
                'cpas'=>0
            );
            $comparation = false;
            if(!empty($dates_b)){
                $dataStatsB = $this->getUserData($user['id'] , $dates_b);
                $dataPPayB = $this->getUserPpay($user['id'], $dates_b);
                $comparation = true;
            }

            $users_return[] = array(
                'id' => $user['id'],
                'user' => $user['user'],
                'username' => $user['username'],
                'responsible' => $user['responsable'] ?? 'ND',
                'registros' => $dataStats['registros'] ?? 0,
                'comsiones' =>  $dataStats['comisiones'] ?? 0,
                'depositantes' =>  $dataStats['depositantes'] ?? 0,
                'cpas' => $dataStats['cpas'] ?? 0,
                'importeEur' => ($dataPPay['EUR'] ?? 0) . ' EUR',
                'importeCop' => ($dataPPay['COP'] ?? 0) . ' COP',
                'registrosComp' => $dataStatsB['registros']??0,
                'registrosPer' => ($dataStatsB['registros']>0 && $dataStats['registros']>0) ? number_format(($dataStats['registros']/$dataStatsB['registros'])*100, 2): 'N/A',
                'comsionesComp' => $dataStatsB['comisiones']??0,
                'comisonesPer' => ($dataStatsB['comisiones']>0 && $dataStats['comisiones']>0) ? number_format(($dataStats['comisiones']/$dataStatsB['comisiones'])*100, 2): 'N/A',
                'depositantesComp' =>  $dataStatsB['depositantes']??0,
                'depositantesPer' => ($dataStatsB['depositantes']>0 && $dataStats['depositantes']>0) ? number_format(($dataStats['depositantes']/$dataStatsB['depositantes'])*100, 2): 'N/A',
                'cpasComp' =>    $dataStatsB['cpas']??0,
                'cpasPer' => ($dataStatsB['cpas']>0 && $dataStats['cpas']>0) ? number_format(($dataStats['cpas']/$dataStatsB['cpas'])*100, 2): 'N/A',
                'comparation' => $comparation
            );
        }
        return $this->json($users_return);

    }

    public function getUserData($userId, $dates)
    {
         return $this->em->getRepository(EstadisticasApi::class)->getDataUser($userId, $dates);
    }

    public function getUserPpay($userId, $dates)
    {
        $data =  $this->em->getRepository(PasarelaBetandealPaymentdata::class)->getDataUser($userId, $dates);
        $info_prepared = array();
        foreach($data as $item){
            $info_prepared[$item['currency']] = $item['money'];
        }
        return $info_prepared;
    }



    //// CLIENTS ////

    /**
     * @Route("/stats/clients", name="app_stats_client")
     */
    public function indexClients(): Response
    {

        // CHEQUEO LOGADO DE USUARIO //
        if (empty($this->userToken)) {
            return $this->redirectToRoute('login');
        }

        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        $statsEntity = new EstadisticasApi();

        $clients = $this->getAllClients();
        $ids = array_column($clients, 'id');
        $ids_search = array();
        foreach ($ids as $id) {
            $ids_search[$id] = $id;
        }
        $clientsname = array_column($clients, 'titcasa');
        $clients_search = array();
        foreach ($clientsname as $client) {
            $clients_search[$client] = $client;
        }

        $filterform = $this->createFormBuilder($statsEntity)
            ->add('fecha',  DateType::class, [
                'widget'=>'single_text',
                'html5'=>false,
                'attr'=>['class'=>'js-datepicker from', 'data-date-start-date'=>date('Y-m-01'), 'data-date-end-date'=>date('Y-m-d'), 'value'=>date('Y-m-01') .' - '. date('Y-m-d')],
                'format'=>'yyyy-mm-dd',
                'label'=>'Dates',
                'row_attr'=>[
                    'class'=>'input-daterange from'
                ]
            ])
            ->add('fecha_b',  DateType::class, [
                'widget'=>'single_text',
                'html5'=>false,
                'attr'=>['class'=>'js-datepicker comparation', 'data-date-start-date'=>date('Y-m-01', strtotime(date('Y-m-01'). ' -1 month')), 'data-date-end-date'=>date('Y-m-d', strtotime(date('Y-m-d'). ' -1 month')), 'value'=>date('Y-m-01', strtotime(date('Y-m-01'). ' -1 month')) .' - '. date('Y-m-d', strtotime(date('Y-m-d'). ' -1 month'))],
                'format'=>'yyyy-mm-dd',
                'label'=>'Dates Compare',
                "mapped" => false,
                'row_attr'=>[
                    'class'=>'input-daterange  comparation compare hide'
                ]
            ])
            ->add('compare', CheckboxType::class, ["mapped"=>false, "attr"=>['class' =>"activeCompare"]])
            ->add('clients', ChoiceType::class, array('choices' => $clients_search, 'attr' => array('class' => 'form-control selectpicker', 'multiple' => true, 'data-live-search' => true, 'data-actions-box' => true, 'expanded' => true), 'label' => 'Client', "mapped" => false))
            ->add('search_stats', SubmitType::class, array('attr' => array('class' => 'btn-primary btn-block',  'data-search' => 'clients')))
            ->getForm();

        $data = array();

        return $this->render('stats/index.html.twig',
            [
                'title' => 'Clients Stats',
                'user' => $this->user,
                'alerts' => $alerts,
                'data' => json_encode($data),
                'formfilter' => $filterform->createView(),
                'responsables' => json_encode($this->getResponsables())

            ]
        );
    }

    /**
     * @Route("/stats/clients/get", name="app_stats_clients_get")
     */
    public function statsClients(Request $request)
    {
        $data = $request->request->all();
        $dates =  explode(' - ',$data['data']['fecha'][0]);
        $clients =  $data['data']['clients'];


        $clients_data = $this->em->getRepository(CasasDeApuestas::class)->findBy(['titcasa'=>$clients]);
        $clients_data = $this->serializer->normalize($clients_data);


        $dates_b = array();
        if(!empty($data['data']['compare'])){
            $dates_b =  explode(' - ',$data['data']['fecha_b'][0]);
        }

        $clients_return = array();
        foreach($clients_data as $client){
            $dataStats = $this->getClientData($client['idCasa'], $dates);
            $dataStatsB = array(
                'registros' => 0,
                'comisiones' =>0,
                'depositantes' =>0,
                'cpas'=>0
            );
            $comparation = false;
            if(!empty($dates_b)){
                $dataStatsB = $this->getClientData($client['idCasa'] , $dates_b);

                $comparation = true;
            }
            $clients_return[] = array(
                'id' => $client['idCasa'],
                'client' => $client['titcasa'],
                'logo' => $client['imgcasa'],
                'registros' => $dataStats['registros'] ?? 0,
                'comsiones' =>  $dataStats['comisiones'] ?? 0,
                'depositantes' =>  $dataStats['depositantes'] ?? 0,
                'cpas' => $dataStats['cpas'] ?? 0,
                'registrosComp' => $dataStatsB['registros']??0,
                'registrosPer' => ($dataStatsB['registros']>0 && $dataStats['registros']>0) ? number_format(($dataStats['registros']/$dataStatsB['registros'])*100, 2): 'N/A',
                'comsionesComp' => $dataStatsB['comisiones']??0,
                'comisonesPer' => ($dataStatsB['comisiones']>0 && $dataStats['comisiones']>0) ? number_format(($dataStats['comisiones']/$dataStatsB['comisiones'])*100, 2): 'N/A',
                'depositantesComp' =>  $dataStatsB['depositantes']??0,
                'depositantesPer' => ($dataStatsB['depositantes']>0 && $dataStats['depositantes']>0) ? number_format(($dataStats['depositantes']/$dataStatsB['depositantes'])*100, 2): 'N/A',
                'cpasComp' =>    $dataStatsB['cpas']??0,
                'cpasPer' => ($dataStatsB['cpas']>0 && $dataStats['cpas']>0) ? number_format(($dataStats['cpas']/$dataStatsB['cpas'])*100, 2): 'N/A',
                'comparation' => $comparation
            );
        }
        return $this->json($clients_return);

    }

    public function getClientData($clientId, $dates)
    {
        return $this->em->getRepository(EstadisticasApi::class)->getDataClient($clientId, $dates);
    }

    public function getAllClients(){
        $clients = $this->em->getRepository(CasasDeApuestas::class)->findAll();
        $clients_array = $this->serializer->normalize($clients);
        $x = 0;
        foreach($clients_array as $client){
            if($client['titcasa'] == '') unset ($clients_array[$x]);
            $x++;
        }
        return $clients_array;
    }


    //// countries ////


    /**
     * @Route("/stats/countries", name="app_stats_countries")
     */
    public function indexCountries(): Response
    {

        // CHEQUEO LOGADO DE USUARIO //
        if (empty($this->userToken)) {
            return $this->redirectToRoute('login');
        }

        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        $statsEntity = new EstadisticasApi();

        $countries = $this->getAllCountries();


        $countries_search = array();
        foreach ($countries as $country) {
            $countries_search[strtoupper($country)] = $country;
        }

        $filterform = $this->createFormBuilder($statsEntity)
            ->add('fecha',  DateType::class, [
                'widget'=>'single_text',
                'html5'=>false,
                'attr'=>['class'=>'js-datepicker from', 'data-date-start-date'=>date('Y-m-01'), 'data-date-end-date'=>date('Y-m-d'), 'value'=>date('Y-m-01') .' - '. date('Y-m-d')],
                'format'=>'yyyy-mm-dd',
                'label'=>'Dates',
                'row_attr'=>[
                    'class'=>'input-daterange from'
                ]
            ])
            ->add('fecha_b',  DateType::class, [
                'widget'=>'single_text',
                'html5'=>false,
                'attr'=>['class'=>'js-datepicker comparation', 'data-date-start-date'=>date('Y-m-01', strtotime(date('Y-m-01'). ' -1 month')), 'data-date-end-date'=>date('Y-m-d', strtotime(date('Y-m-d'). ' -1 month')), 'value'=>date('Y-m-01', strtotime(date('Y-m-01'). ' -1 month')) .' - '. date('Y-m-d', strtotime(date('Y-m-d'). ' -1 month'))],
                'format'=>'yyyy-mm-dd',
                'label'=>'Dates Compare',
                "mapped" => false,
                'row_attr'=>[
                    'class'=>'input-daterange  comparation compare hide'
                ]
            ])
            ->add('compare', CheckboxType::class, ["mapped"=>false, "attr"=>['class' =>"activeCompare"]])
            ->add('countries', ChoiceType::class, array('choices' => $countries_search, 'attr' => array('class' => 'form-control selectpicker', 'multiple' => true, 'data-live-search' => true, 'data-actions-box' => true, 'expanded' => true), 'label' => 'Countries', "mapped" => false))
            ->add('search_stats', SubmitType::class, array('attr' => array('class' => 'btn-primary btn-block',  'data-search' => 'countries')))
            ->getForm();

        $data = array();

        return $this->render('stats/index.html.twig',
            [
                'title' => 'Countries Stats',
                'user' => $this->user,
                'alerts' => $alerts,
                'data' => json_encode($data),
                'formfilter' => $filterform->createView(),
                'responsables' => json_encode($this->getResponsables())

            ]
        );
    }

    /**
     * @Route("/stats/countries/get", name="app_stats_countries_get")
     */
    public function statsCountries(Request $request)
    {
        $data = $request->request->all();
        $dates =  explode(' - ',$data['data']['fecha'][0]);
        $countries =  $data['data']['countries'];
        $dates_b = array();
        if(!empty($data['data']['compare'])){
            $dates_b =  explode(' - ',$data['data']['fecha_b'][0]);
        }
        $countries_return = array();
        foreach($countries as $key => $country){
            $dataStats = $this->getCountrytData($country , $dates);
            $dataStatsB = array(
                'registros' => 0,
                'comisiones' =>0,
                'depositantes' =>0,
                'cpas'=>0
            );
            $comparation = false;
            if(!empty($dates_b)){
                $dataStatsB = $this->getCountrytData($country , $dates_b);
                $comparation = true;
            }
            $countries_return[] = array(
                'id' => $key,
                'country' => strtoupper($country),
                'registros' => $dataStats['registros'] ?? 0,
                'comsiones' =>  $dataStats['comisiones'] ?? 0,
                'depositantes' =>  $dataStats['depositantes'] ?? 0,
                'cpas' => $dataStats['cpas'] ?? 0,
                'registrosComp' => $dataStatsB['registros']??0,
                'registrosPer' => ($dataStatsB['registros']>0 && $dataStats['registros']>0) ? number_format(($dataStats['registros']/$dataStatsB['registros'])*100, 2): 'N/A',
                'comsionesComp' => $dataStatsB['comisiones']??0,
                'comisonesPer' => ($dataStatsB['comisiones']>0 && $dataStats['comisiones']>0) ? number_format(($dataStats['comisiones']/$dataStatsB['comisiones'])*100, 2): 'N/A',
                'depositantesComp' =>  $dataStatsB['depositantes']??0,
                'depositantesPer' => ($dataStatsB['depositantes']>0 && $dataStats['depositantes']>0) ? number_format(($dataStats['depositantes']/$dataStatsB['depositantes'])*100, 2): 'N/A',
                'cpasComp' =>    $dataStatsB['cpas']??0,
                'cpasPer' => ($dataStatsB['cpas']>0 && $dataStats['cpas']>0) ? number_format(($dataStats['cpas']/$dataStatsB['cpas'])*100, 2): 'N/A',
                'comparation' => $comparation

            );

        }
        return $this->json($countries_return);

    }

    public function getCountrytData($country, $dates)
    {
        return $this->em->getRepository(EstadisticasApi::class)->getDataCountry($country, $dates);
    }

    public function getAllCountries(){
        $countries = $this->serializer->normalize($this->em->getRepository(Campanias::class)->findAll());
        $countries = array_column($countries, 'paises');
        $countries_return = array();
        foreach($countries as $country){
            if(is_array($country) && count($country) === 1){
                $countries_return[] = $country[0];
            }
        }
        $countries_return[] = 'Rest of the World';
        $countries_return = array_unique($countries_return);
        return $countries_return;
    }

    /**
     * @Route("/stats/clicks", name="app_stats_clicks")
     */
    public function indexClicks(): Response
    {

        // CHEQUEO LOGADO DE USUARIO //
        if (empty($this->userToken)) {
            return $this->redirectToRoute('login');
        }

        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        $statsEntity = new EstadisticasApi();

        $clients = $this->getAllClients();
        $ids = array_column($clients, 'id');
        $ids_search = array();
        foreach ($ids as $id) {
            $ids_search[$id] = $id;
        }
        $clientsname = array_column($clients, 'titcasa');
        $clients_search = array();
        foreach ($clientsname as $client) {
            $clients_search[$client] = $client;
        }

        $users = $this->getAllUsers();
        $ids = array_column($users, 'id');
        $ids_search = array();
        foreach ($ids as $id) {
            $ids_search[$id] = $id;
        }
        $usernames = array_column($users, 'username');
        $users_search = array();
        foreach ($usernames as $user) {
            $users_search[$user] = $user;
        }

        $filterform = $this->createFormBuilder($statsEntity)
            ->add('fecha',  DateType::class, [
                'widget'=>'single_text',
                'html5'=>false,
                'attr'=>['class'=>'js-datepicker from', 'data-date-start-date'=>date('Y-m-01'), 'data-date-end-date'=>date('Y-m-d'), 'value'=>date('Y-m-01') .' - '. date('Y-m-d')],
                'format'=>'yyyy-mm-dd',
                'label'=>'Dates',
                'row_attr'=>[
                    'class'=>'input-daterange from'
                ]
            ])
            ->add('clients', ChoiceType::class, array('choices' => $clients_search, 'attr' => array('class' => 'form-control selectpicker', 'multiple' => true, 'data-live-search' => true, 'data-actions-box' => true, 'expanded' => true), 'label' => 'Client', "mapped" => false))
            ->add('users', ChoiceType::class, array('choices' => $users_search, 'attr' => array('class' => 'form-control selectpicker', 'multiple' => true, 'data-live-search' => true, 'data-actions-box' => true, 'expanded' => true), 'label' => 'Username', "mapped" => false))
            ->add('search_stats', SubmitType::class, array('attr' => array('class' => 'btn-primary btn-block',  'data-search' => 'clicks')))
            ->getForm();

        $data = array();

        return $this->render('stats/index.html.twig',
            [
                'title' => 'Clicks Stats',
                'user' => $this->user,
                'alerts' => $alerts,
                'data' => json_encode($data),
                'formfilter' => $filterform->createView(),
                'responsables' => json_encode($this->getResponsables())

            ]
        );
    }

    /**
     * @Route("/stats/clicks/get", name="app_stats_clicks_get")
     */
    public function statsClicks(Request $request)
    {
        $data = $request->request->all();
        $dates =  explode(' - ',$data['data']['fecha'][0]);
        $clients =  $data['data']['clients'];
        $users =  $data['data']['users'];


        $clients_data = $this->em->getRepository(CasasDeApuestas::class)->findBy(['titcasa'=>$clients]);
        $clients_data = $this->serializer->normalize($clients_data);

        $users_data = $this->em->getRepository(LoginBusiness::class)->findBy(['username'=>$users]);
        $users_data = $this->serializer->normalize($users_data);

        $clients_return = array();
        foreach($clients_data as $client){
            $dataStats = $this->getClicksData($client['idCasa'], $users, $dates);
            if(empty($dataStats)) {
                continue;
            }
            foreach ($dataStats as $stat){
                $clients_return[] = array(
                    'id' => $stat['fecha'],
                    'idusuario' => $stat['idUsuario'],
                    'username' => $stat['username'],
                    'client' => $stat['titcamp'],
                    'idCampaniaUsuario' => $stat['idCampaniaUsuario'],
                    'codigo' => $stat['codigo'],
                    'clicks_totales' => $stat['ctotales'] ?? 0,
                    'clicks_unicos' =>  $stat['cuniques'] ?? 0,
                );
            }

        }
      return $this->json($clients_return);

    }

    public function getClicksData($client, $users, $dates)
    {
        $users_ids = $this->serializer->normalize($this->em->getRepository(LoginBusiness::class)->findBy(['username' =>$users]));
        $users_ids_array = array_column($users_ids,'id');
        $campaniasUsuarios = array_column($this->serializer->normalize($this->em->getRepository(CampaniasUsuario::class)->findBy(['idUsuario'=> $users_ids_array])), 'idCampaniaUsuario');
        $campaniasClicks = $this->em->getRepository(CampaniasUsuarioClicks::class)->findByUsingDates($campaniasUsuarios, $client, $dates);
        return $campaniasClicks;

    }

}

