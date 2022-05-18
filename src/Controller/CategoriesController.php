<?php

namespace App\Controller;

use App\Entity\Main\CategoriasCampania;
use App\Entity\Main\LoginAdmin;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class CategoriesController extends AbstractController
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
        $this->userToken = $tokenStorage->getToken();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/categories", name="app_categories")
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
        $categories = $this->em->getRepository(CategoriasCampania::class)->findAll();
        $categories_array = $this->serializer->normalize($categories);

        return $this->render('categories/index.html.twig',
            [
                'title' => 'Categories',
                'user' => $this->user,
                'alerts' =>$alerts,
                'categories' => json_encode($categories_array),
            ]
        );
    }

    /**
     * @Route("/category/save", name="app_categories_save")
     */

    public function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $newData = $request->get('newData');
        $id = $request->get('id');

        $CategoryObj = $this->em->getRepository(CategoriasCampania::class)->find($id);
        if(empty($CategoryObj) or !$this->checkRealId($id)){
            $CategoryObj = new CategoriasCampania();
        }

        if(isset($newData['titcat'])){
            $CategoryObj->setTitcat($newData['titcat']);
        }

        if(isset($newData['actcat'])){
            $active = (empty($newData['actcat']) || $newData['actcat'] == 'false')? 0: 1;
            $CategoryObj->setActcat($active);
        }

        $doctrine->getManager()->persist($CategoryObj);
        $doctrine->getManager()->flush();
        return $this->json(array('success'=>1, 'msg'=>'Category saved', 'data'=>$CategoryObj));
    }
}
