<?php

namespace App\Controller;

use App\Entity\Main\CasasCompetidores;
use App\Entity\Main\CasasCompetidoresComentarios;
use App\Entity\Main\CategoriasCampania;
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

class CompetencyController extends AbstractController
{
    const LOGOS_FOLDER = 'competidores';

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
        $this->userToken = $tokenStorage->getToken();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/competency", name="app_competency")
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
        $competency = $this->em->getRepository(CasasCompetidores::class)->findAll();
        $competency_array = $this->serializer->normalize($competency);
        $competency_array = $this->getCompetency_array($competency_array);
        $competency_comments = $this->getComments($competency_array);
        $countries = $this->getCountries();

        return $this->render('competency/index.html.twig',
            [
                'title' => 'Competency',
                'user' => $this->user,
                'alerts' =>$alerts,
                'competency' => json_encode($competency_array),
                'comments' => json_encode($competency_comments),
                'countries' => json_encode($countries),
            ]
        );
    }

    /**
     * @Route("/competency/save", name="app_competency_save")
     */

    public function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $newData = $request->get('newData');
        $id = $request->get('id');

        $CompetencyObj = $this->em->getRepository(CasasCompetidores::class)->find($id);
        if(empty($CompetencyObj) or !$this->checkRealId($id)){
            $CompetencyObj = new CasasCompetidores();
        }

        if(isset($newData['nombre'])){
            $CompetencyObj->setNombre($newData['nombre']);
        }

        if(isset($newData['activo'])){
            $active = (empty($newData['activo']) || $newData['activo'] == 'false')? 0: 1;
            $CompetencyObj->setActivo($active);
        }

        if(isset($newData['logo'])){
            $logo = str_replace('"', '', $newData['logo']);
            $CompetencyObj->setLogo($logo);
        }

        if(isset($newData['esGlobal'])){
            $active = (empty($newData['esGlobal']) || $newData['esGlobal'] == 'false')? 0: 1;
            $CompetencyObj->setEsGlobal($active);
        }

        if(isset($newData['paises'])){
            $CompetencyObj->setPaises(json_encode($newData['paises']));
        }

        $doctrine->getManager()->persist($CompetencyObj);
        $doctrine->getManager()->flush();

        if(isset($newData['comentario'])){
            $fecha = date('Y-m-d H:i:s');

            $CompetencyCommentObj = new CasasCompetidoresComentarios();

            $CompetencyCommentObj->setIdCasa($id);
            $CompetencyCommentObj->setUsuario($this->userToken->getUser()->getUsername());
            $CompetencyCommentObj->setFecha($fecha);
            $CompetencyCommentObj->setComentario($newData['comentario']);
            $doctrine->getManager()->persist($CompetencyCommentObj);
            $doctrine->getManager()->flush();
        }

        return $this->json(array('success'=>1, 'msg'=>'Competency saved', 'data'=>$CompetencyObj));    }

    /**
     * @param $competency_array
     * @return array
     */
    public function getCompetency_array($competency_array): array
    {
        $x = 0;
        foreach ($competency_array as $comp) {
            $competency_array[$x]['paises'] = str_replace('"', '', $comp['paises']);
            $x++;
        }
        return $competency_array;
    }

    /**
     * @param array $comments_array
     * @return array
     */
    public function getComments(array $competency_array): array
    {
        $x = 0;
        foreach ($competency_array as $comp) {
            $compComments = $this->serializer->normalize($this->em->getRepository(CasasCompetidoresComentarios::class)->findBy(['idCasa' => $comp['id']]));
            $comments_array[$comp['id']] = $compComments;

            $x++;
        }
        return $comments_array;
    }

    /**
     * @Route("/competency/upload", name="app_clients_upload_logo")
     */
    function uploadLogo(FileUploader $file, ManagerRegistry $doctrine, Request $request):Response
    {

        if(isset($request->files->get('files')[0])){
            $uploadedFile = $request->files->get('files')[0];

            $logo = $file->upload($uploadedFile, self::LOGOS_FOLDER);

        }
        return $this->json($logo);
    }
}
