<?php

namespace App\Controller;

use App\Entity\Main\CustomPages;
use App\Entity\Premiumpay\PasarelaBetandeal;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Service\FileUploader;

class SiteCreatorController extends AbstractController
{
    const LOGOS_FOLDER = 'sitecreator';


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
     * @Route("/site-creator", name="app_site_creator")
     */
    public function index(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if (empty($this->userToken)) {
            return $this->redirectToRoute('login');
        }
        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        $sites = $this->getAllSites();
        $countries = $this->getCountries();

        return $this->render('site_creator/index.html.twig',
            [
                'title' => 'SiteCreator',
                'user' => $this->user,
                'alerts' => $alerts,
                'sites' => addslashes(json_encode($sites)),
                'countries' => json_encode($countries),
                'countries_selector' => addslashes(json_encode($this->getCountriesSelector())),
            ]
        );
    }

    public function getAllSites()
    {
        $sites_array =  $this->serializer->normalize($this->em->getRepository(CustomPages::class)->findAll());
        $custom_sites = array();
        foreach($sites_array as $site){
            $pasarelas_site = $this->em->getRepository(PasarelaBetandeal::class)->findBy(['idpasarela' => $site['idUsuario'], 'activo'=>true]);
            $pasarelas_selector = $this->serializer->normalize($pasarelas_site);
            $site['pasarelas'][] = array('id'=>0, 'show'=>'Without Premiumpay');
            foreach($pasarelas_selector as $pasarela){
                $site['pasarelas'][] = array('id'=>$pasarela['id'], 'show'=>$pasarela['id']. '# '.$pasarela['nombre']);
            }
            $countries = json_decode($site['pais']);
            $countries = array_values(array_unique($countries));
            $site['pais'] = $countries;

            $urls_stats = json_decode($site['urlStats']);

            if(!empty($urls_stats) && count($urls_stats) > 1){
                $site['urlStats'] = $urls_stats[1];
            }else{
                $site['urlStats'] = '';
            }
            $custom_sites[] = $site;
        }
        return $custom_sites;
    }

    /**
     * @Route("/site-creator/upload", name="app_sitecreator_upload_logo")
     */
    function uploadLogo(FileUploader $file, ManagerRegistry $doctrine, Request $request):Response
    {

        if(isset($request->files->get('files')[0])){
            $uploadedFile = $request->files->get('files')[0];

            $logo = $file->upload($uploadedFile, self::LOGOS_FOLDER);

        }
        return $this->json($logo);
    }


    /**
     * @Route("/site-creator/save", name="app_sitecreator_save")
     */
    function save(FileUploader $file, ManagerRegistry $doctrine, Request $request):Response
    {
        $newData = $request->get('newData');
        $id = $request->get('id');



        $siteObj = $doctrine->getRepository(CustomPages::class)->find($id);
        /*var_export($newData);
        var_export($id);
        var_export($siteObj);
        die();*/

        if(isset($newData["activo"])){
            $active = (empty($newData['activo']) || $newData['activo'] == 'false')? 0: 1;
            $siteObj->setActivo($active);
        }

        if(isset($newData["casas"])){
            $siteObj->setCasas($newData["casas"]);
        }

        if(isset($newData["esGeolocalizada"])){
            $siteObj->setEsGeolocalizad($newData["esGeolocalizada"]);
        }

        if(isset($newData["fecha"])){
            $siteObj->setFecha($newData["fecha"]);
        }

        if(isset($newData["idPasarela"])){
            $siteObj->setIdPasarela($newData["idPasarela"]);
        }

        if(isset($newData["idUsuario"])){
            $siteObj->setIdUsuario($newData["idUsuario"]);
        }

        if(isset($newData["imagen"])){
            $imagen = str_replace('"', '', $newData["imagen"]);
            $siteObj->setImagen($imagen);
        }

        if(isset($newData["imagenFondo"])){
            $imagenFondo = str_replace('"', '', $newData["imagenFondo"]);
            $siteObj->setImagenFondo($imagenFondo);
        }

        if(isset($newData["mostrarPasarela"])){
            $active = (empty($newData["mostrarPasarela"]) || $newData["mostrarPasarela"] == 'false')? 0: 1;
            $siteObj->setMostrarPasarela($active);
        }

        if(isset($newData["mostrarStats"])){
            $active = (empty($newData["mostrarStats"]) || $newData["mostrarStats"] == 'false')? 0: 1;
            $siteObj->setMostrarStats($active);
        }

        if(isset($newData["nombre"])){
            $siteObj->setNombre($newData["nombre"]);
        }

        if(isset($newData["pais"])){
            $siteObj->setPais($newData["pais"]);
        }

        if(isset($newData["primeroCuotas"])){
            $active = (empty($newData["primeroCuotas"]) || $newData["primeroCuotas"] == 'false')? 0: 1;
            $siteObj->setPrimeroCuota($active);
        }

        if(isset($newData["primeroPpay"])){
            $active = (empty($newData["primeroPpay"]) || $newData["primeroPpay"] == 'false')? 0: 1;
            $siteObj->setPrimeroPpay($active);
        }

        if(isset($newData["url"])){
            $siteObj->setUrl($newData["url"]);
        }

        if(isset($newData["urlStats"])){
            $siteObj->setUrlStats($newData["urlStats"]);
        }

        $doctrine->getManager()->persist($siteObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=> 'Site saved'));
    }

}
