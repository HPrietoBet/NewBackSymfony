<?php

namespace App\Controller;

use App\Entity\Main\CasasCompetidores;
use App\Entity\Main\CasasCompetidoresComentarios;
use App\Entity\Main\Noticias;
use App\Service\FileUploader;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class NewsController extends AbstractController
{
    const LOGOS_FOLDER = 'news';

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
        $this->userToken = $tokenStorage->getToken();        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/news", name="app_news")
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

        $news_array = $this->getNews_array();

        return $this->render('news/index.html.twig',
            [
                'title' => 'News',
                        'user' => $this->user,
        'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'news' => addslashes(json_encode($news_array)),
            ]
        );
    }

    /**
     * @Route("/news/save", name="app_news_save")
     */

    public function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $newData = $request->get('newData');
        $oldData = $request->get('oldData') ?? array('actnoticia'=> '', 'contenidoDe'=> '', 'contenidoEn'=> '', 'contenidoEs'=> '', 'contenidoFr'=> '', 'contenidoIt'=> '', 'contenidoPt'=> '', 'descriptionDe'=> '', 'descriptionEn'=> '', 'descriptionEs'=> '', 'descriptionFr'=> '', 'descriptionIt'=> '', 'descriptionPt'=> '', 'fecha'=> '', 'id'=> '', 'imagenDestacada'=> '', 'noticiasRelacionadas'=> '', 'paisesNoticia'=> '', 'titleAll'=> '', 'titleDe'=> '', 'titleEn'=> '', 'titleEs'=> '', 'titleFr'=> '', 'titleIt'=> '', 'titlePt'=> '', 'tituloDe'=> '', 'tituloEn'=> '', 'tituloEs'=> '', 'tituloFr'=> '', 'tituloIt'=> '', 'tituloPt'=> '', 'urlDe'=> '', 'urlEn'=> '', 'urlEs'=> '', 'urlFr'=> '', 'urlIt'=> '', 'urlPt'=> '',);
        $id = $request->get('id');

        $newsObj = $this->em->getRepository(Noticias::class)->find($id);

        if(empty($newsObj) or !$this->checkRealId($id)){
            $newsObj = new Noticias();
        }

        $date= $newData['fecha'] ?? date('Y-m-d');
        $newsObj->setFecha($date);

        $newsObj->setTitulo($newData['titulo'] ?? $oldData['titulo']);
        $newsObj->setContenido($newData['contenido'] ?? $oldData['contenido']);

        $newsObj->setTituloEn($newData['tituloEn'] ?? $oldData['tituloEn']);
        $newsObj->setContenidoEn($newData['contenidoEn'] ?? $oldData['contenidoEn']);

        $newsObj->setTituloDe( '');
        $newsObj->setContenidoDe( '');

        $newsObj->setTituloFr( '');
        $newsObj->setContenidoFr( '');

        $newsObj->setTituloIt($newData['tituloIt']  ?? $oldData['tituloIt']);
        $newsObj->setContenidoIt($newData['contenidoIt']  ?? $oldData['contenidoIt']);

        $newsObj->setTituloPt($newData['tituloPt'] ?? $oldData['tituloPt']);
        $newsObj->setContenidoPt($newData['contenidoPt'] ?? $oldData['contenidoPt']);

        if(isset($newData['actnoticia'])){
            $active = (empty($newData['actnoticia']) || $newData['actnoticia'] == 'false')? 0: 1;
            $newsObj->setActnoticia($active);
        }

        if(isset($newData['plataforma'])){
            $newsObj->setPlataforma($newData['plataforma']);
        }

        $doctrine->getManager()->persist($newsObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=>1, 'msg'=>'News saved', 'data'=>$newsObj));
    }


    /**
     * @return array
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function getNews_array(): array
    {
        $news = $this->em->getRepository(Noticias::class)->findAll();
        $news_array = array_reverse($this->serializer->normalize($news));
        $x = 0;
        foreach ($news_array as $newsItem) {
            $news_array[$x]['titleAll'] = '';
            if ($newsItem['titulo'] != '') {
                $news_array[$x]['titleAll'] = $newsItem['titulo'];
            } elseif ($newsItem['tituloEn'] != '') {
                $news_array[$x]['titleAll'] = $newsItem['tituloEn'];
            } elseif ($newsItem['tituloPt'] != '') {
                $news_array[$x]['titleAll'] = $newsItem['tituloPt'];
            } elseif ($newsItem['tituloIt'] != '') {
                $news_array[$x]['titleAll'] = $newsItem['tituloIt'];
            }
            $x++;
        }
        return $news_array;
    }
}
