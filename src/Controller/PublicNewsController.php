<?php

namespace App\Controller;

use App\Entity\Main\NoticiasPublicas;
use App\Lib\Roles;
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

class PublicNewsController extends AbstractController
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
        /* control de accesos (view)*/
        $this->perms = new Roles($this->userToken, $doctrine);
        $this->access = $this->perms->checkAccess();
        $this->actionsLocked = $this->access['actions'];
        if(!empty($this->access['uri'])){
            $this->redirectToHome();
        }
        /* fin control de accesos */
    }

    /**
     * @Route("/news/public", name="app_public_news")
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
        $news_selector = array();
        foreach ($news_array as $item) {
            $news_selector[]=array(
                'id'=> $item['id'],
                'show' => $item['titleAll'],
            );
        }


        return $this->render('public_news/index.html.twig',
            [
            'title' => 'Public News',
            'user' => $this->user,
            'usersselector' => $this->getUsersSelector(),
            'alerts' =>$alerts,
            'news' => addslashes(json_encode($news_array)),
            'news_select' => addslashes(json_encode($news_selector)),
            'actionsLocked' => json_encode($this->actionsLocked),
            ]
        );
    }

    /**
     * @Route("/news/public/save", name="app_newspublic_save")
     */

    public function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $newData = $request->get('newData');
        $oldData = $request->get('oldData') ?? array('actnoticia'=> '', 'contenidoDe'=> '', 'contenidoEn'=> '', 'contenidoEs'=> '', 'contenidoFr'=> '', 'contenidoIt'=> '', 'contenidoPt'=> '', 'descriptionDe'=> '', 'descriptionEn'=> '', 'descriptionEs'=> '', 'descriptionFr'=> '', 'descriptionIt'=> '', 'descriptionPt'=> '', 'fecha'=> '', 'id'=> '', 'imagenDestacada'=> '', 'noticiasRelacionadas'=> '', 'paisesNoticia'=> '', 'titleAll'=> '', 'titleDe'=> '', 'titleEn'=> '', 'titleEs'=> '', 'titleFr'=> '', 'titleIt'=> '', 'titlePt'=> '', 'tituloDe'=> '', 'tituloEn'=> '', 'tituloEs'=> '', 'tituloFr'=> '', 'tituloIt'=> '', 'tituloPt'=> '', 'urlDe'=> '', 'urlEn'=> '', 'urlEs'=> '', 'urlFr'=> '', 'urlIt'=> '', 'urlPt'=> '',);

        $id = $request->get('id');


        $newsObj = $this->em->getRepository(NoticiasPublicas::class)->find($id);

        if(empty($newsObj) or !$this->checkRealId($id)){
            $newsObj = new NoticiasPublicas();
        }

        $langs = array();

        if(isset($newData['actnoticia'])){
            $active = (empty($newData['actnoticia']) || $newData['actnoticia'] == 'false')? false: true;
            $newsObj->setActnoticia($active);
        }

        $date= $newData['fecha'] ?? date('Y-m-d');
        $newsObj->setFecha($date);

        $newsObj->setTituloEs($newData['tituloEs']??$oldData['tituloEs']);
        $newsObj->setContenidoEs($newData['contenidoEs']??$oldData['contenidoEs']);
        $newsObj->setTitleEs($newData['titleEs']??$oldData['titleEs']);
        $newsObj->setDescriptionEs($newData['descriptionEs']??$oldData['descriptionEs']);
        $newsObj->setUrlEs($newData['urlEs']??$oldData['urlEs']);
        if(!empty($newData['urlEs']) && $newData['urlEs']!='') {
            $langs[]='es';
        }

        $newsObj->setTituloEn($newData['tituloEn']??$oldData['tituloEn']);
        $newsObj->setContenidoEn($newData['contenidoEn']??$oldData['contenidoEn']);
        $newsObj->setTitleEn($newData['titleEn']??$oldData['titleEn']);
        $newsObj->setDescriptionEn($newData['descriptionEn']??$oldData['descriptionEn']);
        $newsObj->setUrlEn($newData['urlEn']??$oldData['urlEn']);
        if(!empty($newData['urlEn']) && $newData['urlEn']!='') {
            $langs[]='en';
        }

        $newsObj->setTituloIt($newData['tituloIt']??$oldData['tituloIt']);
        $newsObj->setContenidoIt($newData['contenidoIt']??$oldData['contenidoIt']);
        $newsObj->setTitleIt($newData['titleIt']??$oldData['titleIt']);
        $newsObj->setDescriptionIt($newData['descriptionIt']??$oldData['descriptionIt']);
        $newsObj->setUrlIt($newData['urlIt']??$oldData['urlIt']);
        if(!empty($newData['urlIt']) && $newData['urlIt']!='') {
            $langs[]='it';
        }

        $newsObj->setTituloPt($newData['tituloPt']??$oldData['tituloPt']);
        $newsObj->setContenidoPt($newData['contenidoPt']??$oldData['contenidoPt']);
        $newsObj->setTitlePt($newData['titlePt']??$oldData['titlePt']);
        $newsObj->setDescriptionPt($newData['descriptionPt']??$oldData['descriptionPt']);
        $newsObj->setUrlPt($newData['urlPt']??$oldData['urlPt']);
        if(!empty($newData['urlPt']) && $newData['urlPt']!='') {
            $langs[]='pt';
        }

        $newsObj->setPaisesNoticia(json_encode($langs));


        if(isset($newData['noticiasRelacionadas'])){
            $noticias_json = json_encode(explode(',', $newData['noticiasRelacionadas']));
            $newsObj->setNoticiasRelacionadas($noticias_json);
        }

        if(isset($newData['imagenDestacada'])){
            $img = str_replace('"', '', $newData['imagenDestacada']);
            $newsObj->setImagenDestacada($img);
        }

        $newsObj->setTitleDe('');
        $newsObj->setDescriptionDe('');
        $newsObj->setUrlDe('');
        $newsObj->setTitleFr('');
        $newsObj->setDescriptionFr('');
        $newsObj->setUrlFr('');


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
        $news = $this->em->getRepository(NoticiasPublicas::class)->findAll();
        $news_array = array_reverse($this->serializer->normalize($news));
        $x = 0;
        foreach ($news_array as $newsItem) {
            $news_array[$x]['titleAll'] = '';
            if ($newsItem['tituloEs'] != '') {
                $news_array[$x]['titleAll'] = $newsItem['tituloEs'];
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


    /**
     * @Route("/news/public/upload", name="app_news_public_upload")
     */
    function uploadLogo(FileUploader $file, ManagerRegistry $doctrine, Request $request):Response
    {

        if(isset($request->files->get('files')[0])){
            $uploadedFile = $request->files->get('files')[0];

            $img = $file->upload($uploadedFile, self::LOGOS_FOLDER);

        }
        return $this->json($img);
    }

}
