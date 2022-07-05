<?php

namespace App\Controller;

use App\Entity\Main\Campanias;
use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\ConexionesApi;
use App\Entity\Main\EstadisticasApi;
use App\Entity\Masterapi\StatsAllOk;
use App\Entity\Main\CampaniasCodes;
use App\Entity\Main\CampaniasUsuario;
use App\Lib\Roles;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\Common\Collections\Criteria;

class StatsSyncController extends AbstractController
{

    const USER = 'betandeal';
    const PASS = 'S1lBQXNiYWs=';

    private $version;
    private $user;
    private $lang;
    public $em;
    private $userToken;
    private $serializer;
    private $client;

    protected $tokenStorage;

    public function __construct($lang = 'en',  ManagerRegistry $doctrine, TokenStorageInterface $tokenStorage, HttpClientInterface $client) {
        $this->lang = $lang;
        $this->em = $doctrine;
        if(!empty($tokenStorage->getToken())){
            $this->userToken = $tokenStorage->getToken();
            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $this->user = $this->userToken->getUser();
            $this->serializer = new Serializer($normalizers, $encoders);
            $this->client = $client;

            /* control de accesos (view)*/
            $this->perms = new Roles($this->userToken, $doctrine);
            if(!empty($this->perms->checkAccess()['uri'])){
                $this->redirectToHome();
            }
            /* fin control de accesos */
        }
    }

    /**
     * @Route("/stats/syncronize", name="app_stats_sync")
     */
    public function index(): Response
    {
        if(empty($this->userToken)){
            return $this->redirect('/login');
        }

        $filterform = $this->createFilterForm();
        $alerts = $this->getAlerts(10);

        return $this->render('stats_sync/index.html.twig',
            [
                'title' => 'Stats Sync.',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'formfilter'=>$filterform->createView(),
            ]
        );
    }
    public function createFilterForm(){

        $clients = $this->getAllConnections();
        $clientsname = array_column($clients, 'nombreApi');
        $clients_search = array();
        foreach ($clientsname as $client) {
            $clients_search[$client] = $client;
        }
        return $this->createFormBuilder()

            ->add('fecha',  DateType::class, [
                'widget'=>'single_text',
                'html5'=>false,
                'attr'=>['class'=>'js-datepicker from', 'data-date-start-date'=>date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))), 'data-date-end-date'=>date('Y-m-d'), 'value'=>date('Y-m-d', strtotime('-2 day', strtotime(date('Y-m-d')))) .' - '. date('Y-m-d')],
                'format'=>'yyyy-mm-dd',
                'label'=>'Dates',
                'row_attr'=>[
                    'class'=>'input-daterange from'
                ]
            ])
            ->add('clients', ChoiceType::class, array('choices' => $clients_search, 'attr' => array('class' => 'form-control selectpicker', 'multiple' => true, 'data-live-search' => true, 'data-actions-box' => true, 'expanded' => true), 'label' => 'Client', "mapped" => false))
            ->add('Syncronize_stats', SubmitType::class, array('attr' => array('class' => 'btn-primary btn-block',  'data-search' => 'clients')))
            ->getForm();

    }

    public function getAllConnections(){
        $clients = $this->em->getRepository(ConexionesApi::class)->findAll();
        $clients_array = $this->serializer->normalize($clients);
        return $clients_array;
    }

    /**
     * @Route("/stats/syncronization", name="app_stats_syncronization")
     */

    public function syncronizeStats(Request $request){
        $clients = ($request->request->get('clients'));
        $fechas = explode(' - ',$request->request->get('fecha')[0]);
        $fechasList = array();
        $fecha = $fechas[0];
        $fechasList[]= $fecha;
            do{
                $fecha = date('Y-m-d', strtotime($fecha. '+ 1 day'));
                $fechasList[]= $fecha;
            }while($fecha < $fechas[1]);


        $stats = $this->em->getRepository(StatsAllOk::class)->findBy(['connectionApi'=>$clients, 'fecha'=>$fechasList]);

        if(empty($stats)){
            return $this->json(array('success'=>1, 'msg'=> 'not data to import', 'data'=>array()));
        }

        $stats_return = array();
        foreach($stats as $stat){
            $values = array(
                'fecha' => $stat->getFecha(),
                'subdId'=> $stat->getSubId(),
                'connectionApi'=> $stat->getConnectionApi(),
                'fuenteMarketing'=> $stat->getFuente(),
                'registros' => $stat->getRegistros(),
                'regBefore' => $stat->getRegistros(),
                'depositantes' => $stat->getDepositantes(),
                'depositantesBefore' =>$stat->getDepositantes(),
                'cpa' => empty($stat->getCpa())? 0: $stat->getCpa() ,
                'cpaBefore' => $stat->getCpa(),
                'comision' => 0,
                'danger' => 0,
                'actualiza' => 0,
                'idStat' => 0,
                'idUser' => '',
                'username' => '',
                'comisionIndividual' => 0,
                'idCampaniaUsuario' => 0,
            );

            if(empty($stat->getDepositantes()) && empty($stat->getRegistros()) && empty($stat->getCpa())) continue;

            $duplicated = $this->em->getRepository(EstadisticasApi::class)->findOneBy(['subId'=>$stat->getSubId(), 'fuenteMarketing'=>$stat->getFuente(), 'connectionId'=>$stat->getConnectionApi(), 'fecha'=>$stat->getFecha()]);
            if(!empty($duplicated)){
                if($duplicated->getRegistros() != $stat->getRegistros() || $duplicated->getDepositantesPrimeraVez() != $stat->getDepositantes() || $duplicated->getCpaGenerados() != $stat->getCpa()){
                    $values['actualiza'] = 1;
                    if($duplicated->getRegistros() > $stat->getRegistros() || $duplicated->getDepositantesPrimeraVez() > $stat->getDepositantes() || $duplicated->getCpaGenerados() > $stat->getCpa()){
                        $values['danger'] = 1;
                    }
                    $values['regBefore'] = $duplicated->getRegistros();
                    $values['depositantesBefore'] = $duplicated->getDepositantesPrimeraVez();
                    $values['cpaBefore'] = $duplicated->getCpaGenerados();
                    $values['idStat'] = $duplicated->getId();
                    $values['comision'] = $duplicated->getComisionGenerada();
                }else{
                    continue;
                }
            }
            $campCodes = $this->em->getRepository(CampaniasCodes::class)->findBy(['codigo'=>$stat->getSubId()]);
            if(!empty($campCodes)){
                foreach($campCodes as $campCode){
                    $camp = $this->em->getRepository(Campanias::class)->findOneBy(['id'=> $campCode->getIdCampania(), 'connectionApi'=>$stat->getConnectionApi()]);
                    if(!empty($camp)){
                        $values['username'] = $campCode->getUsername();
                        $values['idCampaniaUsuario'] = $campCode->getIdUsuario();
                        $campUsu = $this->em->getRepository(CampaniasUsuario::class)->findOneBy(['idCampaniaUsuario'=>$campCode->getIdUsuario()]);
                        if(!empty($campUsu)){
                            $values['idUser'] = $campUsu->getIdUsuario();
                            $values['idStat'] = empty($values['idStat']) ? $this->random_str_generator(5): $values['idStat'];
                            $values['comision'] = !empty($stat->getCpa()) ? $stat->getCpa()*(!empty($campUsu->getComisionVip())?$campUsu->getComisionVip():  $campUsu->getComision() ) : 0;
                            $values['comisionIndividual'] = !empty($campUsu->getComisionVip())?$campUsu->getComisionVip():  $campUsu->getComision();
                            $stats_return[] = $values;
                        }else{
                            continue;
                        }
                    }else{
                        continue;
                    }
                }
            }else{
                continue;
            }
        }
        $returned_end = array(
            'new' => array(),
            'update' => array(),
        );
        foreach($stats_return as $stat){
            if(!empty($stat['actualiza'])){
                $returned_end['update'][] = $stat;
            }else{
                $returned_end['new'][] = $stat;
            }
        }
        $data = $returned_end;
        return $this->json(array('success'=>1, 'msg'=>'syncronized', 'data'=>$data));
    }

    /**
     * @Route("/stats/syncronization/save", name="app_stats_syncronization_save")
     */

    public function save(Request $request): Response{

        $newData = $request->request->get('newData');
        if(!empty($request->request->has('oldData'))){
            $oldData = $request->request->get('oldData');
        }else{
            $oldData = array();
        }

        $id = !empty($request->request->has('id')) ? $request->request->get('id') : array();

        if(empty($oldData)){
            foreach($newData as $data){
                if(!isset($data['idCampaniaUsuario'])) {
                    $data['idCampaniaUsuario'] = substr($data['subdId'], 1);
                }
                $statsObj = new EstadisticasApi();
                $statsObj->setFecha($data['fecha']);
                $statsObj->setSubId($data['subdId']);
                $statsObj->setConnectionId($data['connectionApi']);
                $statsObj->setIdCampaniaUsuario($data['idCampaniaUsuario']);
                $statsObj->setComisionGenerada($data['comision']);
                $statsObj->setCpaGenerados($data['cpa']);
                $statsObj->setRegistros($data['registros']);
                $statsObj->setDepositantesPrimeraVez($data['depositantes']);
                $statsObj->setFuenteMarketing($data['fuenteMarketing']);
                $this->em->getManager()->persist($statsObj);
                $this->em->getManager()->flush();
            }
            $returned = $newData;
        }else{
            if(!$this->checkRealId($id)) {
                $statsObj = new EstadisticasApi();
                $statsObj->setFecha($oldData['fecha']);
                $statsObj->setSubId($oldData['subdId']);
                $statsObj->setConnectionId($oldData['connectionApi']);
                $statsObj->setIdCampaniaUsuario($oldData['idCampaniaUsuario']);
                $statsObj->setComisionGenerada($newData['cpa'] ?? $oldData['cpa'] * $oldData['comisionIndividual']);
                $statsObj->setCpaGenerados($newData['cpa'] ?? $oldData['cpa']);
                $statsObj->setRegistros($newData['registros'] ?? $oldData['registros']);
                $statsObj->setDepositantesPrimeraVez($newData['depositantes'] ?? $oldData['depositantes']);
                $statsObj->setFuenteMarketing($oldData['fuenteMarketing']);
                $this->em->getManager()->persist($statsObj);
                $this->em->getManager()->flush();
                $returned = $this->serializer->normalize($statsObj);
            }else {
                $statsObj = $this->em->getRepository(EstadisticasApi::class)->find($id);
                if (!empty($statsObj)) {
                    if (isset($newData['registros'])) {
                        $statsObj->setRegistros($newData['registros']);
                    }
                    if (isset($newData['depositantes'])) {
                        $statsObj->setDepositantesPrimeraVez($newData['depositantes']);
                    }
                    if (isset($newData['cpa'])) {
                        $statsObj->setCpaGenerados($newData['cpa']);
                        $statsObj->setComisionGenerada($newData['cpa'] * $oldData['comisionIndividual']);
                    }
                    $this->em->getManager()->persist($statsObj);
                    $this->em->getManager()->flush();
                    $returned = $this->serializer->normalize($statsObj);
                }
            }

        }
        return $this->json(array('success'=>1, 'msg'=>'Data saved', 'data'=> $returned));
    }

}
