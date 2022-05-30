<?php

namespace App\Controller;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasEnlace;
use App\Entity\Main\CustomLinks;
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

class CustomLinksController extends AbstractController
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

        $this->userToken = $tokenStorage->getToken();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->user = $this->userToken->getUser();
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/custom-links", name="app_custom-links")
     */
    public function index(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if (empty($this->userToken)) {
            return $this->redirectToRoute('login');
        }
        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        $links = $this->getAllLinks();
        $countries = $this->getCountries();

        return $this->render('custom_links/index.html.twig',
            [
                'title' => 'Custom Links',
                        'user' => $this->user,
        'usersselector' => $this->getUsersSelector(),
                'alerts' => $alerts,
                'customlinks' => addslashes(json_encode($links)),
                'countries' => json_encode($countries),
                'countries_selector' => addslashes(json_encode($this->getCountriesSelector())),
            ]
        );
    }

    public function getAllLinks(){
        $links = ($this->serializer->normalize($this->em->getRepository(CustomLinks::class)->findAll()));
        $links_array = array();
        foreach($links as $link){
            list($links_array, $link) = $this->preparedLink($links_array, $link);
        }
        $links_returned = array();
        foreach($links_array as $key => $link){
            $links_returned[] = $link;
        }
       //echo '<pre>'.print_r($links_returned, true).'</pre>';die();
        return $links_returned;
    }

    /**
     * @param array $links_array
     * @param $link
     * @return array
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function preparedLink(array $links_array, $link): array
    {
        if (empty($links_array[$link['url'] . $link['idUsuario']])) {
            $link['username'] = $this->em->getRepository(LoginBusiness::class)->find($link['idUsuario'])->getUsername();
            $links_array[$link['url'] . $link['idUsuario']] = $link;
        }
        if (!isset($links_array[$link['url'] . $link['idUsuario']]['enlaces'])) $links_array[$link['url'] . $link['idUsuario']]['enlaces'] = array();
        if (!isset($links_array[$link['url'] . $link['idUsuario']]['realIds'])) $links_array[$link['url'] . $link['idUsuario']]['realIds'] = array();
        if (!isset($links_array[$link['url'] . $link['idUsuario']]['paises'])) $links_array[$link['url']     . $link['idUsuario']]['paises'] = array();
        if (!isset($links_array[$link['url'] . $link['idUsuario']]['campanias'])) $links_array[$link['url'] . $link['idUsuario']]['paises'] = array();
        $links_array[$link['url'] . $link['idUsuario']]['campanias'][] = $this->serializer->normalize($this->em->getRepository(Campanias::class)->find($this->em->getRepository(CampaniasEnlace::class)->find($link['casas'])->getIdCampania())->getTitcamp());
        $links_array[$link['url'] . $link['idUsuario']]['enlaces'][] = $this->serializer->normalize($this->em->getRepository(CampaniasEnlace::class)->find($link['casas']));
        $links_array[$link['url'] . $link['idUsuario']]['realIds'][] = $link['id'];
        $links_array[$link['url'] . $link['idUsuario']]['paises'][] = $link['pais'];
        return array($links_array, $link);
    }

    /**
     * @Route("/custom-links/save", name="app_custom-links_save")
     */
    public function save( ManagerRegistry $doctrine, Request $request):Response
    {
        $newData = $request->get('newData');
        $oldData = $request->get('oldData');
        $ids = $oldData['realIds'];
        foreach($ids as $id){
            $linkObj = $this->em->getRepository(CustomLinks::class)->find($id);

            if(!empty($newData['nombre'])){
                $linkObj->setNombre($newData['nombre']);
            }
            if(!empty($newData['url'])){
                $linkObj->setUrl($newData['url']);
            }
            $doctrine->getManager()->persist($linkObj);
            $doctrine->getManager()->flush();
        }
        return $this->json(array('success'=> 1, 'msg'=> 'Links saved'));
    }
}
