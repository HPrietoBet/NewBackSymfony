<?php

namespace App\Controller;

use App\Entity\Main\ComisionesPendientesCajero;
use App\Entity\Main\Facturacion;
use App\Entity\Main\FacturacionDatos;
use App\Entity\Main\MetodosPagos;
use App\Lib\Roles;
use App\Service\FileUploader;
use Doctrine\Persistence\ManagerRegistry;
use MongoDB\Driver\Manager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use function Sodium\add;

class InvoicingInfoController extends AbstractController
{
    const CSV_FOLDER = 'comisiones';

    private $version;
    private $user;
    private $lang;
    public $em;
    private $userToken;
    private $serializer;

    protected $tokenStorage;

    public function __construct($lang = 'en', ManagerRegistry $doctrine, TokenStorageInterface $tokenStorage)
    {

        $this->lang = $lang;
        $this->em = $doctrine;
        if (empty($tokenStorage->getToken())) {
            return $this->redirect('/login');
            die();
        }
        $this->userToken = $tokenStorage->getToken();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->user = $this->userToken->getUser();
        $this->serializer = new Serializer($normalizers, $encoders);

        /* control de accesos (view)*/
        $this->perms = new Roles($this->userToken, $doctrine);
        $this->access = $this->perms->checkAccess();
        $this->actionsLocked = $this->access['actions'];
        if (!empty($this->access['uri'])) {
            $this->redirectToHome();
        }
        /* fin control de accesos */
    }

    /**
     * @Route("/invoicing/info", name="app_invoicing_info")
     */
    public function index(): Response
    {

        // CHEQUEO LOGADO DE USUARIO //
        if (empty($this->userToken)) {
            return $this->redirectToRoute('login');
        }

        // CHEQUEO LOGADO DE USUARIO //
        $alerts = $this->getAlerts(10);

        return $this->render('invoicing_info/index.html.twig',
            [
                'title' => 'Invoicing Info',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' => $alerts,
                'invoicinginfo' => addslashes(json_encode($this->getInvoicingInfo())),
                'countries' => addslashes(json_encode($this->getCountriesName())),
                'actionsLocked' => json_encode($this->actionsLocked)
            ]
        );
    }

    public function getInvoicingInfo()
    {

        $data = ($this->serializer->normalize($this->em->getRepository(FacturacionDatos::class)->findAll()));
        return $data;
    }

    /**
     * @Route("/invoicing/info/save", name="app_invoicing_info_save")
     */

    public function save(ManagerRegistry $doctrine, Request $request): Response
    {

        $newData = $request->get('newData');
        $id = $request->get('id');

        $invObj = $doctrine->getRepository(FacturacionDatos::class)->find($id);

        if (isset($newData["tipo"])) {
            $invObj->setTipo($newData["tipo"]);
        }

        if (isset($newData["nombre"])) {
            $invObj->setNombre($newData["nombre"]);
        }

        if (isset($newData["nombreEmpresa"])) {
            $invObj->setNombreEmpresa($newData["nombreEmpresa"]);
        }

        if (isset($newData["nif"])) {
            $invObj->setNif($newData["nif"]);
        }

        if (isset($newData["email"])) {
            $invObj->setEmail($newData["email"]);
        }

        if (isset($newData["telefono"])) {
            $invObj->setTelefono($newData["telefono"]);
        }

        if (isset($newData["control"])) {
            $invObj->setControl($newData["control"]);
        }

        if (isset($newData["direccion"])) {
            $invObj->setDireccion($newData["direccion"]);
        }

        if (isset($newData["cpostal"])) {
            $invObj->setCpostal($newData["cpostal"]);
        }

        if (isset($newData["poblacion"])) {
            $invObj->setPoblacion($newData["poblacion"]);
        }

        if (isset($newData["provincia"])) {
            $invObj->setProvincia($newData["provincia"]);
        }

        if (isset($newData["pais"])) {
            $invObj->setPais($newData["pais"]);
        }

        if (isset($newData["fechaCaducidad"])) {
            $invObj->setFechaCaducidad($newData["fechaCaducidad"]);
        }

        $doctrine->getManager()->persist($invObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success' => 1, 'msg' => 'Invoicing info saved'));
    }

    /**
     * @Route("/invoicing/payments", name="app_invoicing_payments")
     */
    public function payments(): Response
    {
        $alerts = $this->getAlerts(10);
        $payments = $this->getPaymentPerUser();

        return $this->render('invoicing_info/index_payments.html.twig',
            [
                'title' => 'Payments Info',
                'user' => $this->user,
                'usersselector' => $this->getUsersSelector(),
                'alerts' => $alerts,
                'infopayments' => addslashes(json_encode($payments)),
                'countries' => addslashes(json_encode($this->getCountriesName())),
                'actionsLocked' => json_encode($this->actionsLocked)
            ]
        );
    }

    public function getPaymentPerUser()
    {
        $users = $this->getInvoicingInfo();
        $payments = $this->serializer->normalize($this->em->getRepository(MetodosPagos::class)->findAll());

        $payment_types = array();
        foreach ($payments as $payment) {
            $payment_types[$payment['idPago']] = $payment['titulopago'];
        }
        $users_payments_returned = array();
        foreach ($users as $user) {

            $users_payments_returned[] = array('id' => $user['idUsuFac'], 'email' => $user['email'], 'nombre' => empty($user['nombre']) ? $user['nombreEmpresa'] : $user['nombre'], 'payment' => empty($payment_types[$user['idPago']]) ? 'Not Defined' : $payment_types[$user['idPago']]);
        }
        return ($users_payments_returned);
    }


    /**
     * @Route("/invoicing/commisions", name="app_invoicing_commisions")
     */
    public function commisions(): Response
    {
        $alerts = $this->getAlerts(10);
        $payments = $this->getPaymentPerUser();
        $commisions = $this->getCommisions();
        $users_selector = $this->getUsersSelector();
        $totalcommisions = $this->getTotalCommisions($users_selector);


        $formUpload = $this->getFormUpload();

        return $this->render('invoicing_info/index_commisions.html.twig',
            [
                'title' => 'Users Commisions',
                'user' => $this->user,
                'usersselector' => $users_selector,
                'alerts' => $alerts,
                'uploadForm' => $formUpload->createView(),
                'infopayments' => addslashes(json_encode($payments)),
                'commisions' => addslashes(json_encode($commisions)),
                'totalCommisions' => addslashes(json_encode($totalcommisions)),
                'actionsLocked' => json_encode($this->actionsLocked)
            ]
        );
    }

    public function getFormUpload()
    {
        $commisonsEntity = new ComisionesPendientesCajero();
        $formUpload = $this->createFormBuilder($commisonsEntity)
            ->add('file', FileType::class, array('attr' => array('class' => 'form-control '), 'label' => 'Commisiones (CSV file)', 'mapped' => false, 'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => [
                        'application/csv',
                    ],
                    'mimeTypesMessage' => 'Please upload a valid CSV document',
                ])
            ]))
            ->add('upload_commisions', SubmitType::class, array('attr' => array('class' => 'btn-primary btn-block')))
            ->getForm();

        return $formUpload;
    }

    /**
     * @Route("/invoicing/commisions/upload", name="app_invoicing_commisions_upload")
     */
    public function upload(FileUploader $file, ManagerRegistry $doctrine, Request $request): Response
    {
        if (!empty($request->files->get('form')['file'])) {
            $uploadedFile = $request->files->get('form')['file'];
            $allowed_extension = 'csv';
            $fileExtension = explode('.', $uploadedFile->getClientOriginalName());

            if (!in_array($allowed_extension, $fileExtension)) {
                return $this->json(array('success' => 0, 'msg' => 'Invalid format file'));
            }

            $comisiones = $file->upload($uploadedFile, self::CSV_FOLDER);
            return $this->json(array('success' => 1, 'msg' => 'File uploaded', 'file' => $comisiones, 'data' => $this->readFile($file->getuploadPath() . '/' . self::CSV_FOLDER . '/' . $comisiones)));
        }
        return $this->json(array('success' => 0, 'msg' => 'File not uploaded'));
    }

    public function readFile($file)
    {

        $csv = array_map(function ($v) {
            return str_getcsv($v, ";");
        }, file($file));
        unset($csv[0]);
        $csv_returned = array();
        foreach ($csv as $item) {
            $csv_returned[] = array('iduser' => $item[0], 'name' => $item[1], 'money' => $item[3], 'description' => $item[4]);
        }
        return $csv_returned;

    }

    /**
     * @Route("/invoicing/commisions/save", name="app_invoicing_commisions_save")
     */
    public function saveCommisions(ManagerRegistry $doctrine, Request $request): Response
    {
        $data = $request->request->get('data');
        if (empty($data)) {
            $data = $request->request->get('newData');
            $id = $request->request->get('id');
            $comObj = $this->em->getRepository(ComisionesPendientesCajero::class)->find($id);
            if (empty($comObj) or !$this->checkRealId($id)) {
                $comObj = ComisionesPendientesCajero();
            }
            if (isset($data['fecha'])) {
                $comObj->setFecha($data['fecha']);
            }
            if (isset($data['idUsuario'])) {
                $comObj->setIdUsuario($data['idUsuario']);
            }

            if (isset($data['concepto'])) {
                $comObj->setConcepto($data['concepto']);
            }
            if (isset($data['importe'])) {
                $comObj->setImporte(str_replace(',', '.', $data['importe']));
            }
            if (isset($data['tipoMovimiento'])) {
                $comObj->setTipoMovimiento($data['tipoMovimiento']);
            }
            $doctrine->getManager()->persist($comObj);
            $doctrine->getManager()->flush();

        } else {
            $tipo = 1;
            foreach ($data as $item) {
                $comObj = new ComisionesPendientesCajero();
                $comObj->setIdUsuario($item['iduser']);
                $comObj->setFecha(date('Y-m-d'));
                $comObj->setConcepto($item['description']);
                $comObj->setImporte(str_replace(',', '.', $item['money']));
                $comObj->setTipoMovimiento($tipo);
                $doctrine->getManager()->persist($comObj);
                $doctrine->getManager()->flush();

            }
        }


        return $this->json(array('success' => 1, 'msg' => 'Commisions Saved'));
    }

    public function getCommisions($traspaso = false)
    {
        $commisions = $this->serializer->normalize($this->em->getRepository(ComisionesPendientesCajero::class)->findBy(array(), array('fecha' => 'desc')));
        $commisions_returned = array();
        foreach ($commisions as $item) {
            preg_match('/Traspaso/i', $item['concepto'], $matches);

            if (empty($matches) && empty($traspaso)) {
                $commisions_returned[] = $item;
            }
            if (!empty($matches) && !empty($traspaso)) {
                $commisions_returned[] = $item;
            }

        }
        return $commisions_returned;

    }

    /**
     * @Route("/invoicing/transfers", name="app_invoicing_transfers")
     */
    public function usersMovements(): Response
    {
        $alerts = $this->getAlerts(10);
        $payments = $this->getPaymentPerUser();
        $users_selector = $this->getUsersSelector();
        $commisions = $this->getCommisions(true);

        return $this->render('invoicing_info/index_traspasos.html.twig',
            [
                'title' => 'Users Movements',
                'user' => $this->user,
                'usersselector' => $users_selector,
                'alerts' => $alerts,
                'commisions' => addslashes(json_encode($commisions)),
                'actionsLocked' => json_encode($this->actionsLocked)
            ]
        );
    }

    public function getTotalCommisions($users_selector)
    {
        $totalcom = $this->em->getRepository(ComisionesPendientesCajero::class)->getTotalCommisions();

        $totalcom_return = array();

        foreach ($users_selector as $user) {
            $totalcom_return[$user['id']]['username'] = $user['username'];
            $totalcom_return[$user['id']]['id'] = $user['id'];
        }

        foreach ($totalcom as $item) {
            $totalcom_return[$item['id_usuario']]['total'] = $item['total'];
            $totalcom_return[$item['id_usuario']]['generadas'] = $item['generadas'];;
            $totalcom_return[$item['id_usuario']]['pagadas'] = $item['pagadas'];
        }

        foreach ($this->getInvoicingInfo() as $item) {
            $totalcom_return[$item['idUsuFac']]['nombre'] = empty($item['nombre']) ? $item['nombreEmpresa'] : $item['nombre'];
            $totalcom_return[$item['idUsuFac']]['control'] = $item['control'] != 1 || empty($item['control']) ? 0 : 1;
        }


        $endReturn = array();
        foreach ($totalcom_return as $end) {
            $endReturn[] = array(
                'control' => empty($end['control']) || $end['control'] != 1 ? 0 : 1,
                'generadas' => empty($end['generadas']) ? 0 : $end['generadas'],
                'id' => empty($end['id']) ? '' : $end['id'],
                'id_usuario' => empty($end['id_usuario']) ? 0 : $end['id_usuario'],
                'nombre' => empty($end['nombre']) ? '' : $end['nombre'],
                'pagadas' => empty($end['pagadas']) ? 0 : $end['pagadas'],
                'total' => empty($end['total']) ? 0 : $end['total'],
                'username' => empty($end['username']) ? '' : $end['username'],
            );
        }
        return $endReturn;
    }


    /**
     * @Route("/invoicing/invoices", name="app_invoicing_invoices")
     */
    public function usersInvoices(): Response
    {
        $alerts = $this->getAlerts(10);
        $payments = $this->getPaymentPerUser();
        $users_selector = $this->getUsersSelector();
        $invoices = $this->getInvoices();

        return $this->render('invoicing_info/index_invoices.html.twig',
            [
                'title' => 'Users Invoices',
                'user' => $this->user,
                'usersselector' => $users_selector,
                'alerts' => $alerts,
                'invoices' => addslashes(json_encode($invoices)),
                'actionsLocked' => json_encode($this->actionsLocked)
            ]
        );
    }

    public function getInvoices()
    {
        $invoices = $this->serializer->normalize($this->em->getRepository(Facturacion::class)->getFacturas());
        $invoices_return = array();
        foreach ($invoices as $item) {
            $invoices_return[] = array(
                'idfac' => $item['id_fac'],
                'iduser' => $item['id'],
                'user' => $item['user'],
                'reffactura' => !empty($item['numero_factura']) ? $item['numero_factura'] . '/' . $item['anio_fac'] : $item['numero_factura_internacional'] . '/' . $item['anio_fac'],
                'nombre' => !empty($item['nombre']) ? $item['nombre'] : $item['nombre_empresa'],
                'email' => $item['username'],
                'fechafactura' => $item['fecha_fac'],
                'importe' => $item['importe'],
                'impuestos' => $item['impuesto'] . '%',
                'factura' => $item['archivo_fac'],
                'pagada' => $item['estapagado']
            );
        }
        //echo '<pre>'.print_r($invoices_return, true).'</pre>';die();

        return $invoices_return;
    }

    /**
     * @Route("/invoicing/invoice/save", name="app_invoicing_invoices_save")
     */

    public function saveInvoice(ManagerRegistry $doctirne, Request $request)
    {
        $newData = $request->request->get('newData');
        $id = $request->request->get('id');

        $facObj = $this->em->getRepository(Facturacion::class)->find($id);
        if (!empty($facObj)) {
            if (isset($newData["fechafactura"])) {
                $facObj->setFechaFac($newData["fechafactura"]);
            }

            if (isset($newData["importe"])) {
                $facObj->setImporte($newData["importe"]);
            }

            if (isset($newData["pagada"])) {
                $facObj->setPagado($newData["pagada"]);
            }

            $doctirne->getManager()->persist($facObj);
            $doctirne->getManager()->flush();
        }

        return $this->json(array('success' => 1, 'msg' => 'Invoice saved'));

    }
}