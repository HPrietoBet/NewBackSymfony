<?php

namespace App\Controller;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasProyectos;
use App\Entity\Main\CasasCompetidores;
use App\Entity\Main\CasasCompetidoresComentarios;
use App\Entity\Main\LoginAdmin;
use App\Entity\Main\Proyectos;
use App\Entity\Main\UsuariosTipo;
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

class ProyectosController extends AbstractController
{

    const LOGOS_FOLDER = 'projects';
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
     * @Route("/projects", name="app_projects")
     */
    public function index(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        $this->user = $this->userToken->getUser();
        // CHEQUEO LOGADO DE USUARIO //

        $users_projects = $this->serializer->normalize($this->getUsersProjects());
        $alerts = $this->getAlerts(10);
        $projects = $this->em->getRepository(Proyectos::class)->findAll();
        $projects_arr = $this->serializer->normalize($projects);
        $projectsComplete = array();
        foreach($projects_arr  as $item){
            $itemCamp  = $this->serializer->normalize($this->em->getRepository(CampaniasProyectos::class)->findBy(['idProyecto' => $item['id']]));

            $item['campanias'] = array();
            $item['usuarios'] = json_decode(is_object($item['usuarios']) ? (array)$item['usuarios']: $item['usuarios'], true);
            foreach ($itemCamp as $camp){
                $item['campanias'][] = $camp['idCampania'];
            }
            $projectsComplete[] = $item;
        }

        $types = $this->em->getRepository(UsuariosTipo::class)->findAll();
        $projects_type =$this->serializer->normalize($types);
        $campanias = $this->getCampaniasActivas();

        return $this->render('proyectos/index.html.twig',
            [
                'title' => 'Projects',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' =>$alerts,
                'projects' => addslashes(json_encode($projectsComplete)),
                'users_projects' => json_encode($users_projects),
                'projects_type' => json_encode($projects_type),
                'campanias'=> addslashes(json_encode($campanias)),
                'actionsLocked' => json_encode($this->actionsLocked)
            ]
        );
    }


    /**
     * @Route("/projects/upload", name="app_projects_logo")
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
     * @Route("/projects/save", name="app_projects_save")
     */

    public function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $newData = $request->get('newData');
        $id = $request->get('id');

        $projectObj = $this->em->getRepository(Proyectos::class)->find($id);
        if(empty($projectObj) or !$this->checkRealId($id)){
            $projectObj = new Proyectos();
        }

        if(isset($newData['nombre'])){
            $projectObj->setNombre($newData['nombre']);
        }

        if(isset($newData['activo'])){
            $active = (empty($newData['activo']) || $newData['activo'] == 'false')? 0: 1;
            $projectObj->setActivo($active);
        }

        if(isset($newData['imagen'])){
            $logo = str_replace('"', '', $newData['imagen']);
            $projectObj->setImagen($logo);
        }

        if(isset($newData['tipo'])){
            $projectObj->setTipo($newData['tipo']);
        }

        if(isset($newData['usuarios'])){
            $arr_users = explode(',', $newData['usuarios']);
            $projectObj->setUsuarios(json_encode($arr_users));
        }

        $doctrine->getManager()->persist($projectObj);
        $doctrine->getManager()->flush();

        if(isset($newData['campanias'])){

            $currentCampaigns = $this->em->getRepository(CampaniasProyectos::class)->findBy(['idProyecto' => $id]);
            foreach($currentCampaigns as $campProObj){
                $this->em->getRepository(CampaniasProyectos::class)->remove($campProObj);
            }
            $campanias_array = explode(',', $newData['campanias']);
            foreach($campanias_array as $item){
                $newCampObj = new CampaniasProyectos();
                $newCampObj->setIdCampania($item);
                $newCampObj->setIdProyecto($id);
                $newCampObj->setActivo(1);
                $this->em->getRepository(CampaniasProyectos::class)->add($newCampObj);
            }
        }

        return $this->json(array('success'=>1, 'msg'=>'Project saved', 'data'=>$projectObj));    }
}
