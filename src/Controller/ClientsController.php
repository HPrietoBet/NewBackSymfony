<?php

namespace App\Controller;

use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\CasasDeApuestasAcuerdos;
use App\Entity\Main\CategoriasCampania;
use App\Entity\Main\LoginAdmin;
use App\Entity\Main\CasasDeApuestasComentarios;
use Container7R2JuWG\get_VarDumper_Command_ServerDump_LazyService;
use Doctrine\Persistence\ManagerRegistry;
use App\Service\FileUploader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ClientsController extends AbstractController
{
    const LOGOS_FOLDER = 'clients';

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
        if(!empty($this->userToken)){
            $this->user = $this->userToken->getUser();
        }
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/clients", name="app_clients")
     */
    public function index(): Response
    {
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);
        $responsables_search = $this->getResponsables($filter= true);

        $clientsEntity = new CasasDeApuestas();
        $clients = $this->getAllClients();
        $ids = array_column($clients, 'idCasa');
        $casas = array_column($clients, 'titcasa');
        foreach($ids as $id){
            $ids_search[$id] = $id;
        }
        $casas_search = array();
        foreach($casas as $casa){
            $casas_search[$casa] = $casa;
        }


        return $this->render('clients/index.html.twig',
            [
                'title' => 'Clients',
                'user' => $this->user,
                'alerts' =>$alerts,
                'clients' => json_encode($clients),
                'responsables' => json_encode($this->getResponsables()),
                'categories' => json_encode($this->getCategories()),
            ]
        );
    }

    public function getResponsables($filter =false){
        $responsables_filtro = array();
        $responsables = $this->em->getRepository(LoginAdmin::class)->findAll();
        $responsables_array = $this->serializer->normalize($responsables);
        if(!empty($filter)){
            $responsables_filtro['Nothing Selected'] = 0;
            foreach($responsables_array as $responsable){
                $responsables_filtro[$responsable['user']] = $responsable['id'];
            }
            return $responsables_filtro;
        }else{

            return $responsables_array;
        }
    }
    public function getAllClients(){
        $clients =  $this->serializer->normalize($this->em->getRepository(CasasDeApuestas::class)->getAllAboutClient());
        $x = 0;
        foreach($clients as $client){
            $clients[$x]['comments'] = $this->serializer->normalize($this->em->getRepository(CasasDeApuestasComentarios::class)->findBy(['idCasa'=>$client['idCasa']]));
            $clients[$x]['newcomments'] = '';
            $clients[$x]['editUrl'] = '/client/edit/'.$client['idCasa'];
            $x++;
        }

        return $clients;
    }

    public function getCategories(){
        $categories =  $this->em->getRepository(CategoriasCampania::class)->findBy(['actcat'=>1]);
        $categories_array = $this->serializer->normalize($categories);
        return $categories_array;
    }



    /**
     * @Route("/clients/upload", name="app_clients_upload_logo")
     */
    function uploadLogo(FileUploader $file, ManagerRegistry $doctrine, Request $request):Response
    {
        $img = $request->request->get('imgsrc')?? null;

        if(!empty($img)){
            $casa_name = $request->request->get('nameCasa') ?? null;
            $file_name = $this->slugify($casa_name).'_'.rand(0,100000000);
            list($type, $data) = explode(';', $img);
            $ext = explode('/', $type)[1];
            list(, $data)      = explode(',', $img);
            $data = base64_decode($data);
            file_put_contents(__DIR__.'/../../public/img/clients/'.$file_name.'.'.$ext, $data);
            $logo = $file_name.'.'.$ext;
        }
        if(isset($request->files->get('files')[0])){
            $uploadedFile = $request->files->get('files')[0];

            $logo = $file->upload($uploadedFile, self::LOGOS_FOLDER);

        }
        return $this->json($logo);
    }

    /**
     * @Route("/client/save", name="app_clients_save")
     */
    function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $newData = $request->get('newData') ?? $request->request->all();

        foreach($newData as $key => $val){
            if(is_array($val)){
                $newData[$key]= join(',',$val);
            }
        }
        $id = $request->get('id') ?? (int)$newData['idCasa'];

        $clientObj = $doctrine->getRepository(CasasDeApuestas::class)->find($id);
        if(empty($clientObj) or !$this->checkRealId($id)){

            $clientObj = new CasasDeApuestas();
        }

        if(isset($newData['idCat'])){
            $clientObj->setIdCat($newData['idCat']);
        }

        if(isset($newData['newLogo']) && !empty($newData['newLogo'])){
            $clientObj->setImgcasa($newData['newLogo']);
        }

        if(isset($newData['idCasPais'])){
            $clientObj->setIdCasPais($newData['idCasPais']);
        }

        if(isset($newData['paisOrder'])){
            $clientObj->setPaisOrder($newData['paisOrder']);
        }

        if(isset($newData['idPaginaHtml'])){
            $idpagehtml = empty($newData['idPaginaHtml'])? null: $newData['idPaginaHtml'];
            $clientObj->setIdPaginaHtml($idpagehtml);
        }

        if(isset($newData['titcasa'])){
            $clientObj->setTitcasa($newData['titcasa']);
        }

        if(isset($newData['imgcasa'])){
            $logo = str_replace('"', '', $newData['imgcasa']);
            $clientObj->setImgcasa($logo);
        }

        if(isset($newData['logoCustom'])){
            $clientObj->setLogoCustom($newData['logoCustom']);
        }

        if(isset($newData['responsable'])){
            $clientObj->setResponsable($newData['responsable']);
        }

        if(isset($newData['bono'])){
            $clientObj->setBono($newData['bono']);
        }

        if(isset($newData['usuario'])){
            $clientObj->setUsuario($newData['usuario']);
        }

        if(isset($newData['password'])){
            $clientObj->setPassword($newData['password']);
        }

        if(isset($newData['url'])){
            $clientObj->setUrl($newData['url']);
        }

        if(isset($newData['metodoCobro'])){
            $clientObj->setMetodoCobro($newData['metodoCobro']);
        }

        if(isset($newData['procedimientoPago'])){
            $clientObj->setProcedimientoPago($newData['procedimientoPago']);
        }

        if(isset($newData['contacto'])){
            $clientObj->setContacto($newData['contacto']);
        }

        if(isset($newData['activoFeedCuotas'])){
            $clientObj->setActivoFeedCuotas($newData['activoFeedCuotas']);
        }

        if(isset($newData['feedCuotas'])){
            $clientObj->setFeedCuotas($newData['feedCuotas']);
        }

        if(isset($newData['activoFeedStreaming'])){
            $clientObj->setActivoFeedStreaming($newData['activoFeedStreaming']);
        }

        if(isset($newData['feedStreaming'])){
            $clientObj->setFeedStreaming($newData['feedStreaming']);
        }

        if(isset($newData['baseline'])){
            $clientObj->setBaseline($newData['baseline']);
        }

        if(isset($newData['requiereFactura'])){
            $clientObj->setRequiereFactura($newData['requiereFactura']);
        }

        if(isset($newData['datosFacturacion'])){
            $clientObj->setDatosFacturacion($newData['datosFacturacion']);
        }

        if(isset($newData['actcasa'])){
            $active = empty($newData['actcasa']) || $newData['actcasa'] == 'false' ? 0: 1;
            $clientObj->setActcasa($active);
        }

        if(isset($newData['impuestos'])){
            $clientObj->setImpuestos($newData['impuestos']);
        }

        if(isset($newData['currency'])){
            $clientObj->setCurrency($newData['currency']);
        }
        $doctrine->getManager()->persist($clientObj);
        $doctrine->getManager()->flush();
        $data = $this->serializer->normalize($clientObj);
        $data['idCasa'] = $clientObj->getIdCasa();

        return $this->json(array('success'=> 1, 'msg'=> 'Client saved', 'data'=>$data));
    }

    /**
     * @Route("/client/comment/delete", name="app_clients_comment_delete")
     */
       public function deleteCommentClient(Request $request, ManagerRegistry $doctrine): Response
       {
           $id = $request->request->get('idcomment');
           $CommentObj = $this->em->getRepository(CasasDeApuestasComentarios::class)->find($id);
           $this->em->getRepository(CasasDeApuestasComentarios::class)->remove($CommentObj);
           return $this->json(array('success'=>1, 'msg'=>'Comment deleted'));
       }

    /**
     * @Route("/client/edit/{client}", name="app_client_edit")
     */
    public function editClient(Request $request): Response{
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        $clientId = $request->get('client');
        $alerts = $this->getAlerts(10);
        $client = $this->getClient($clientId);
        $clientComments = $this->getCommments($clientId);
        $client['comments'] = $clientComments;
        $imgcasa = explode('/', $client['imgcasa']);
        $client['imgcasa'] = end($imgcasa);

        $responsables_search = $this->getResponsables($filter= true);
        $categories_select = $this->getCategories_search();


        $form = $this->createFormBuilder($client)
            ->add('newLogo', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('idCasa', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('titcasa', TextType::class, array( 'label'=>'Client', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('idCat', ChoiceType::class, array('choices'=>$categories_select, 'label'=>'Category', 'attr'=>array('class'=>'form-control selectpicker' )))
            ->add('url', TextType::class, array( 'label'=>'Link', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('logo', FileType::class, array('attr'=>array('class'=>'form-control'), 'required'=>false, 'label'=> 'Change Logo'))
            ->add('contacto', TextType::class, array( 'label'=>'Contact', 'attr'=>array('class'=>'form-control', 'required'=>false)))
            ->add('idCasPais', CountryType::class, array('attr'=>array('class' => 'form-control selectpicker ', 'multiple'=>true, 'data-live-search'=>true), 'label'=>'Country', 'required'=>true))
            ->add('responsable', ChoiceType::class, array('choices'=>$responsables_search, 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Responsible'))
            ->add('actcasa', ChoiceType::class, array('choices'=>array('No Active'=>0, 'Active'=> 1 ),  'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Active', 'required'=>false))
            ->add('usuario', TextType::class, array( 'label'=>'User', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('password', TextType::class, array( 'label'=>'Password', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('activoFeedCuotas', ChoiceType::class, array('choices'=>array('Active'=> 1, 'No Active'=>0), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Feed Odds'))
            ->add('feedCuotas', TextType::class, array( 'label'=>'Feed Oods', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('activoFeedStreaming', ChoiceType::class, array('choices'=>array('Active'=> 1, 'No Active'=>0), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Feed Streaming'))
            ->add('feedStreaming', TextType::class, array( 'label'=>'Feed Streaming', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('bono', TextType::class, array( 'label'=>'Bono', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('idPaginaHtml', TextType::class, array( 'label'=>'Html Page Id', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('Edit_Client_Info', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();


        $formDeal = $this->createFormBuilder($client)
            ->add('idCasa', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('baseline', TextType::class, array( 'label'=>'Baseline', 'attr'=>array('class'=>'form-control')))
            ->add('cpa', TextType::class, array( 'label'=>'CPA Value', 'attr'=>array('class'=>'form-control')))
            ->add('cpaMoneda', ChoiceType::class, array('choices'=>$this->getCurrencies(), 'label'=>'CPA Currency', 'attr'=>array('class'=>'form-control selectpicker')))
            ->add('rs', TextType::class, array( 'label'=>'RS', 'attr'=>array('class'=>'form-control')))
            ->add('fee', TextType::class, array( 'label'=>'FEE', 'attr'=>array('class'=>'form-control')))
            ->add('feeMoneda', ChoiceType::class, array('choices'=>$this->getCurrencies(), 'label'=>'Fee Currency', 'attr'=>array('class'=>'form-control selectpicker')))
            ->add('acuerdoActivo', ChoiceType::class, array('choices'=>array('Active'=> 1, 'No Active'=>0), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Active Deal?'))
            ->add('Edit_Deal_Info', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();

        $formInvoice = $this->createFormBuilder($client)
            ->add('idCasa', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('datosFacturacion', TextType::class, array( 'label'=>'Invoicing Info', 'attr'=>array('class'=>'form-control')))
            ->add('metodoCobro', TextType::class, array( 'label'=>'Payment Method', 'attr'=>array('class'=>'form-control')))
            ->add('procedimientoPago', TextType::class, array( 'label'=>'Payment Proccess', 'attr'=>array('class'=>'form-control')))
            ->add('requiereFactura', ChoiceType::class, array('choices'=>array('Yes'=> 1, 'No'=>0), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Invoice Required'))
            ->add('impuestos', ChoiceType::class, array('choices'=>$this->getIvas(),  'label'=>'IVA', 'attr'=>array('class'=>'form-control selectpicker')))
            ->add('currency', ChoiceType::class, array('choices'=>$this->getCurrencies(),  'label'=>'Currency', 'attr'=>array('class'=>'form-control selectpicker')))
            ->add('Edit_Invoice_Info', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();

        $formComments = $this->createFormBuilder($client)
            ->add('idCasa', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('comment', TextareaType::class, array( 'label'=>'New Comment', 'attr'=>array('class'=>'form-control', 'style'=>'min-height:250px')))
            ->add('Send_Comment', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();
        return $this->render('clients/edit.html.twig',
            [
                'title' => $client['titcasa'],
                'user' => $this->user,
                'alerts' =>$alerts,
                'form' => $form->createView(),
                'formDeal' => $formDeal->createView(),
                'formInvoice' => $formInvoice->createView(),
                'formComments' => $formComments->createView(),
                'client' => $client,
                'responsables' => $this->getResponsables(),
                'categories' => $this->getCategories(),
                'comments' => $clientComments,
                'isNew' => 0

            ]
        );
    }

    /**
     * @Route("/client/new", name="app_client_new")
     */
    public function newClient(Request $request): Response{
        // CHEQUEO LOGADO DE USUARIO //
        if(empty($this->userToken)){
            return  $this->redirectToRoute('login');
        }
        $clientId = 0;

        $alerts = $this->getAlerts(10);
        $client = $this->getClient($clientId);
        $client['titcasa']  = 'New Client';
        $clientComments = $this->getCommments($clientId);

        $client['comments'] = $clientComments;
        $responsables_search = $this->getResponsables($filter= true);

        $categories_select = $this->getCategories_search();

        $form = $this->createFormBuilder($client)
            ->add('newLogo', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('idCasa', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('titcasa', TextType::class, array( 'label'=>'Client', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('idCat', ChoiceType::class, array('choices'=>$categories_select, 'label'=>'Category', 'attr'=>array('class'=>'form-control selectpicker' )))
            ->add('url', TextType::class, array( 'label'=>'Link', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('logo', FileType::class, array('attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('contacto', TextType::class, array( 'label'=>'Contact', 'attr'=>array('class'=>'form-control', 'required'=>false)))
            ->add('idCasPais', CountryType::class, array('attr'=>array('class' => 'form-control selectpicker ', 'multiple'=>true, 'data-live-search'=>true), 'label'=>'Country'))
            ->add('responsable', ChoiceType::class, array('choices'=>$responsables_search, 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Responsible'))
            ->add('actcasa', ChoiceType::class, array('choices'=>array('No Active'=>0, 'Active'=> 1 ),  'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Active', 'required'=>false))
            ->add('usuario', TextType::class, array( 'label'=>'User', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('password', TextType::class, array( 'label'=>'Password', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('activoFeedCuotas', ChoiceType::class, array('choices'=>array('Active'=> 1, 'No Active'=>0), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Feed Odds'))
            ->add('feedCuotas', TextType::class, array( 'label'=>'Feed Oods', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('activoFeedStreaming', ChoiceType::class, array('choices'=>array('Active'=> 1, 'No Active'=>0), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Feed Streaming'))
            ->add('feedStreaming', TextType::class, array( 'label'=>'Feed Streaming', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('bono', TextType::class, array( 'label'=>'Bono', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('idPaginaHtml', TextType::class, array( 'label'=>'Html Page Id', 'attr'=>array('class'=>'form-control'), 'required'=>false))
            ->add('New_Client', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();



        $formDeal = $this->createFormBuilder($client)
            ->add('baseline', TextType::class, array( 'label'=>'Baseline', 'attr'=>array('class'=>'form-control')))
            ->add('idCasa', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('cpa', TextType::class, array( 'label'=>'CPA Value', 'attr'=>array('class'=>'form-control')))
            ->add('cpaMoneda', ChoiceType::class, array('choices'=>$this->getCurrencies(), 'label'=>'CPA Currency', 'attr'=>array('class'=>'form-control selectpicker')))
            ->add('rs', TextType::class, array( 'label'=>'RS', 'attr'=>array('class'=>'form-control')))
            ->add('fee', TextType::class, array( 'label'=>'FEE', 'attr'=>array('class'=>'form-control')))
            ->add('feeMoneda', ChoiceType::class, array('choices'=>$this->getCurrencies(), 'label'=>'Fee Currency', 'attr'=>array('class'=>'form-control selectpicker')))
            ->add('acuerdoActivo', ChoiceType::class, array('choices'=>array('Active'=> 1, 'No Active'=>0), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Active Deal?'))
            ->add('Edit_Deal_Info', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();

        $formInvoice = $this->createFormBuilder($client)
            ->add('datosFacturacion', TextType::class, array( 'label'=>'Invoicing Info', 'attr'=>array('class'=>'form-control')))
            ->add('idCasa', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('impuestos', ChoiceType::class, array('choices'=>$this->getIvas(), 'label'=>'IVA', 'attr'=>array('class'=>'form-control selectpicker')))
            ->add('currency', ChoiceType::class, array('choices'=>$this->getCurrencies(), 'label'=>'Currency', 'attr'=>array('class'=>'form-control selectpicker')))
            ->add('metodoCobro', TextType::class, array( 'label'=>'Payment Method', 'attr'=>array('class'=>'form-control')))
            ->add('procedimientoPago', TextType::class, array( 'label'=>'Payment Proccess', 'attr'=>array('class'=>'form-control')))
            ->add('requiereFactura', ChoiceType::class, array('choices'=>array('Yes'=> 1, 'No'=>0), 'attr'=>array('class'=>'form-control selectpicker',), 'label'=>'Invoice Required'))
            ->add('Edit_Invoice_Info', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();

        $formComments = $this->createFormBuilder($client)
            ->add('idCasa', HiddenType::class, array( 'label'=>'Id client', 'attr'=>array('class'=>'form-control')))
            ->add('comment', TextareaType::class, array( 'label'=>'New Comment', 'attr'=>array('class'=>'form-control', 'style'=>'min-height:250px')))
            ->add('Send_Comment', SubmitType::class, array('attr'=> array('class' => 'btn-primary btn-block')))
            ->getForm();


        return $this->render('clients/edit.html.twig',
            [
                'title' => 'New Client',
                'user' => $this->user,
                'alerts' =>$alerts,
                'form' => $form->createView(),
                'formDeal' => $formDeal->createView(),
                'formInvoice' => $formInvoice->createView(),
                'formComments' => $formComments->createView(),
                'client' => $client,
                'responsables' => $this->getResponsables(),
                'categories' => $this->getCategories(),
                'comments' => $clientComments,
                'isNew' => 1
            ]
        );
    }

    public function getClient($clientId){
        return  $this->serializer->normalize($this->em->getRepository(CasasDeApuestas::class)->getAllAboutClient($clientId));
    }
    public function getCommments($clientId){
        return  $this->serializer->normalize($this->em->getRepository(CasasDeApuestasComentarios::class)->findBy(['idCasa' =>$clientId], ['fecha'=>'desc']));
    }

    public function getCategories_search(){
        $cat_search = array();

        foreach($this->getCategories() as $cat){
            $cat_search[$cat['titcat']]  = $cat['idCat'];
        }
        return $cat_search;
    }

    /**
     * @Route("/client/comment/add", name="app_client_comment_add")
     */

    public function addComment(Request $request, ManagerRegistry $doctrine): Response{
        $data= $request->request->all();

        $idCasa = (int)$data['idCasa'][0];
        $date = date('Y-m-d H:i:s');
        $CommentObj = new CasasDeApuestasComentarios();
        $CommentObj->setIdCasa($idCasa);
        $CommentObj->setUsuario($this->user->getUsername());
        $CommentObj->setComentario($data['comment'][0]);
        $CommentObj->setFecha($date);
        $data = $this->serializer->normalize($CommentObj);
        $doctrine->getManager()->persist($CommentObj);
        $doctrine->getManager()->flush();
        return $this->json(array('success'=> 1, 'msg'=>'Comment saved', 'data'=> $data));
    }

    /**
     * @Route("/client/invoice/save", name="app_client_invoice_save")
     */

    public function saveInvoice(Request $request, ManagerRegistry $doctrine): Response{
        $data= $request->request->all();
        $idCasa = (int)$data['idCasa'][0];

        $ClientObj = $this->em->getRepository(CasasDeApuestas::class)->find($idCasa);
        $ClientObj->setDatosFacturacion($data['datosFacturacion'][0]);
        $ClientObj->setImpuestos((string)$data['impuestos'][0]);
        $ClientObj->setCurrency($data['currency'][0]);
        $ClientObj->setMetodoCobro($data['metodoCobro'][0]);
        $ClientObj->setProcedimientoPago($data['procedimientoPago'][0]);
        $ClientObj->setRequiereFactura($data['requiereFactura'][0]);

        $data = $this->serializer->normalize($ClientObj);
        $doctrine->getManager()->persist($ClientObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=>'Invoicing info saved', 'data'=> $data));

    }

    /**
     * @Route("/client/deal/save", name="app_client_deal_save")
     */
    public function saveDeal(Request $request, ManagerRegistry $doctrine): Response{
        $data= $request->request->all();
        $idCasa = (int)$data['idCasa'][0];

        $ClientObj = $this->em->getRepository(CasasDeApuestas::class)->find($idCasa);
        $ClientObj->setBaseline($data['baseline'][0]);
        $doctrine->getManager()->persist($ClientObj);
        $doctrine->getManager()->flush();

        $DealObj = $this->em->getRepository(CasasDeApuestasAcuerdos::class)->findOneBy(['idCasa'=>$idCasa]);
        if(empty($DealObj)){
            $DealObj = new CasasDeApuestasAcuerdos();
            $DealObj->setIdCasa($idCasa);
        }

        $DealObj->setCpa($data['cpa'][0]);

        $DealObj->setCpaMoneda($data['cpaMoneda'][0]);
        $DealObj->setFee($data['fee'][0]);
        $DealObj->setFeeMoneda($data['feeMoneda'][0]);
        $DealObj->setRs($data['rs'][0]);
        $DealObj->setAcuerdoActivo($data['acuerdoActivo'][0]);

        $data_returned = $this->serializer->normalize($DealObj);
        $doctrine->getManager()->persist($DealObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=>'Deal info saved', 'data'=> $data_returned));

    }


}


