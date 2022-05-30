<?php

namespace App\Controller;

use App\Entity\Main\Campanias;
use App\Entity\Main\EstadisticasApi;
use App\Entity\Main\FacturacionDatos;
use App\Entity\Main\CampaniasCodes;
use App\Entity\Main\LoginAdmin;
use App\Entity\Main\LoginBusiness;
use App\Entity\Main\UsuariosAfiliadosPagos;
use App\Entity\Main\UsuariosFuentes;
use App\Entity\Premiumpay\PasarelaBetandealPaymentdata;
use App\Entity\Premiumpay\User;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



class HomeController extends AbstractController
{
    private $version;
    private $user;
    private $lang;
    private $userToken;
    private $serializer;

    public $em;

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
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        // CHEQUEO LOGADO DE USUARIO //

        $this->user = $this->userToken->getUser();

        $last_user_array = $this->getLastUsers();
        $last_user_json = json_encode($last_user_array);
        $total_players = $this->getTotalPlayers();
        $active_campaigns_counter = count($this->getActiveCampaigns());
        $totalMoney = $this->getAllMoney();
        $responsables = $this->getResponsables();
        $last_cash_actions = $this->getLastCashActions();
        $charts_dates = array(
            'init'=> date('Y-01-01'),
            'end' => date('Y-m-d'),
        );
        $comisionesChart = json_encode($this->getChartComisiones($charts_dates));
        $ppayEurChart = json_encode($this->getPPaySales($charts_dates, 'eur'));
        $ppayCopChart = json_encode($this->getPPaySales($charts_dates, 'cop'));

        $alerts = $this->getAlerts(10);


        return $this->render('home/index.html.twig',
            [
                'title' => 'Home',
                        'user' => $this->user,
        'usersselector' => $this->getUsersSelector(),
                'lastusers' => $last_user_json,
                'totalplayers' => $total_players,
                'countercampaigns' => $active_campaigns_counter,
                'totalmoney' => $totalMoney,
                'responsables' => $responsables,
                'lastcashactions' => $last_cash_actions,
                'defaultdates' => $charts_dates,
                'comisionesgraph' => $comisionesChart,
                'eurppaygraph' => $ppayEurChart,
                'copppaygraph' => $ppayCopChart,
                'alerts' =>$alerts

            ]
        );
    }

    public function getTotalPlayers(){
        $players_new = $this->em->getRepository(EstadisticasApi::class)->countAll();
        $players_old = $this->em->getRepository(UsuariosAfiliadosPagos::class)->countAll();
        return number_format($players_new+$players_old, 0, ',','.');
    }

    public function getActiveCampaigns(){
        $active_campaigns = $this->em->getRepository(Campanias::class)->findBy(['actcamp'=>1]);
        return $active_campaigns;
    }

    public function getAllMoney(){
        $new =  $this->em->getRepository(EstadisticasApi::class)->getSumMoney();
        $old = $this->em->getRepository(UsuariosAfiliadosPagos::class)->getSumMoney();
        $to = 10000000;
        $next_to = 5000000;
        if($new+$old > $to){
            $to = $to+$next_to;
        }
        $percent = (($new+$old)*100) / $to;
        return array('now'=>number_format($new+$old, '2', ',', '.'), 'to'=>$to, 'percent' => $percent);
    }

    public function getLastUsers(){
        $last_users = $this->em->getRepository(LoginBusiness::class)->findBy(['activo'=>0, 'mostrarAdminlogin' => 1]);
        $last_user_array = $this->serializer->normalize($last_users);
        $last_user_end = array();
        $last_user_ids = array();
        foreach ($last_user_array as $last_user){
            $last_user_ids[]=$last_user['id'];
            $user_traffic = $this->em->getRepository(UsuariosFuentes::class)->findBy(array('idUsuario'=>$last_user['id']));
            unset($last_user['roles']);
            $last_user['trafficType'] = $this->serializer->normalize($user_traffic)[0]['tipo'];
            $last_user['trafficUrl'] = $this->serializer->normalize($user_traffic)[0]['url'];
            $last_user_end[] = $last_user;
        }
        return ($last_user_end);
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

    public function getLastCashActions(){
        $cashActions = $this->em->getRepository(FacturacionDatos::class)->findBy(['mostrarAdminlogin' =>1]);
        $cashActions_array = $this->serializer->normalize($cashActions);
        return json_encode($cashActions_array);
    }

    public function getChartComisiones($chartDates){
        $comisiones = $this->em->getRepository(EstadisticasApi::class)->getChartInfo($chartDates);
        $comisiones_array = $this->serializer->normalize($comisiones);
        $comisiones_return = array();

        foreach($comisiones_array as $comision){
            $comisiones_return_end = array('label'=> array(), 'comisiones' => array(), 'players' => array(), 'max'=> 0);
            $year_month_array = explode('-', $comision['fecha']);
            if(empty($comisiones_return[$year_month_array[0]])){
                if(empty($comisiones_return[$year_month_array[0].'/'.$year_month_array[1]])){
                    $comisiones_return[$year_month_array[0].'/'.$year_month_array[1]]= array('comision' => 0, 'jugadores' => 0);
                }
            }else{
                if(empty($comisiones_return[$year_month_array[0].'/'.$year_month_array[1]])){
                    $comisiones_return[$year_month_array[0].'/'.$year_month_array[1]]= array('comision' => 0, 'jugadores' => 0);
                }
            }
            $comisiones_return[$year_month_array[0].'/'.$year_month_array[1]]['comision']+=$comision['comisiones'];
            $comisiones_return[$year_month_array[0].'/'.$year_month_array[1]]['jugadores']+=$comision['jugadores'];
        }

        foreach($comisiones_return as $date => $agregados){
            $comisiones_return_end['label'][]= $date;
            $comisiones_return_end['comisiones'][]= (int)$agregados['comision'];
            $comisiones_return_end['players'][]= (int)$agregados['jugadores'];
        }
        $comisiones_return_end['max'] = max($comisiones_return_end['comisiones']);
        return $comisiones_return_end;
    }

    public function getPPaySales($chartDates, $currency = 'EUR'){
        $pagos = $this->em->getRepository(PasarelaBetandealPaymentdata::class)->getChartInfo($chartDates, $currency);
        $pagos_array = $this->serializer->normalize($pagos);

        $pagos_return = array();

        foreach($pagos_array as $comision){
            $pagos_return_end = array('label'=> array(), 'ventas' => array(), 'transactions' => array(), 'max'=> 0);
            $year_month_array = explode('-', $comision['fecha']);
            if(empty($pagos_return[$year_month_array[0]])){
                if(empty($pagos_return[$year_month_array[0].'/'.$year_month_array[1]])){
                    $pagos_return[$year_month_array[0].'/'.$year_month_array[1]]= array('ventas' => 0, 'transacciones' => 0);
                }
            }else{
                if(empty($pagos_return[$year_month_array[0].'/'.$year_month_array[1]])){
                    $pagos_return[$year_month_array[0].'/'.$year_month_array[1]]= array('ventas' => 0, 'transacciones' => 0);
                }
            }
            $pagos_return[$year_month_array[0].'/'.$year_month_array[1]]['ventas']+=$comision['ventas'];
            $pagos_return[$year_month_array[0].'/'.$year_month_array[1]]['transacciones']+=$comision['transacciones'];
        }

        foreach($pagos_return as $date => $agregados){
            $pagos_return_end['label'][]= $date;
            $pagos_return_end['ventas'][]= $agregados['ventas'];
            $pagos_return_end['transactions'][]= (int)$agregados['transacciones'];
        }
        $pagos_return_end['max'] = max($pagos_return_end['ventas']);
        $pagos_return_end['maxTransactions'] = max($pagos_return_end['transactions']);
        return $pagos_return_end;

    }

    /**
     * @Route("/home/charts", name="app_home_charts")
     */
    public function charts(Request $request): Response
    {
        $init = $request->get('date_init');
        $end = $request->get('date_end');
        $dates = array(
            'init' => $init,
            'end' => $end
        );

        return $this->json(array('success'=> 1, 'msg'=> 'data send', 'data'=> array('comisiones' => $this->getChartComisiones($dates) , 'eur_chart' => $this->getPPaySales($dates, 'EUR') , 'cop_chart' => $this->getPPaySales($dates, 'COP'))));
    }
}



