<?php

namespace App\Controller;

use App\Entity\Main\FacturacionDatos;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacturacionDatosController extends AbstractController
{
    /**
     * @Route("/facturacion-datos", name="app_facturacion_datos")
     */
    public function index(): Response
    {
        return $this->render('facturacion_datos/index.html.twig', [
            'controller_name' => 'FacturacionDatosController',
        ]);
    }

    /**
     * @Route("/facturacion-datos/save", name="app_facturacion_datos_save")
     */
    public function save(Request $request, ManagerRegistry $doctrine): Response
    {
        $newData = $request->get('newData');

        $id = $request->get('id');


        $factObj = $doctrine->getRepository(FacturacionDatos::class)->find($id);

        if(isset($newData["idUsuFac"])){
            $factObj->setIdUsuFac($newData['idUsuFac']);
        }

        if(isset($newData["control"])){
            $active = (empty($newData['control']) || $newData['control'] == 'false')? 0: 1;
            $factObj->setControl($active);
        }

        if(isset($newData["cpostal"])){
            $factObj->setCpostal($newData['cpostal']);
        }

        if(isset($newData["direccion"])){
            $factObj->setDireccion($newData['direccion']);
        }

        if(isset($newData["dniFac"])){
            $factObj->setDniFac($newData['dniFac']);
        }

        if(isset($newData["docfrontal"])){
            $factObj->setDocfrontal($newData['docfrontal']);
        }

        if(isset($newData["docreverso"])){
            $factObj->setDocreverso($newData['docreverso']);
        }

        if(isset($newData["email"])){
            $factObj->setEmail($newData['email']);
        }

        if(isset($newData["fechaAlta"])){
            $factObj->setFechaAlta($newData['fechaAlta']);
        }

        if(isset($newData["fechaCaducidad"])){
            $factObj->setFechaCaducidad($newData['fechaCaducidad']);
        }

        if(isset($newData["mostrarAdminlogin"])){
            $active = (empty($newData['mostrarAdminlogin']) || $newData['mostrarAdminlogin'] == 'false')? 0: 1;
            $factObj->setMostrarAdminlogin($active);
        }

        if(isset($newData["multifacturas"])){
            $active = (empty($newData['multifacturas']) || $newData['multifacturas'] == 'false')? 0: 1;
            $factObj->setMultifacturas($active);
        }

        if(isset($newData["multifacturasSubir"])){
            $active = (empty($newData['multifacturasSubir']) || $newData['multifacturasSubir'] == 'false')? 0: 1;
            $factObj->setMultifacturasSubir($active);
        }

        if(isset($newData["nif"])){
            $factObj->setNif($newData['nif']);
        }

        if(isset($newData["nombre"])){
            $factObj->setNombre($newData['nombre']);
        }

        if(isset($newData["nombreCompletoPago"])){
            $factObj->setNombreCompletoPago($newData['nombreCompletoPago']);
        }

        if(isset($newData["nombreEmpresa"])){
            $factObj->setNombreEmpresa($newData['nombreEmpresa']);
        }

        if(isset($newData["numcuenta"])){
            $factObj->setNumcuenta($newData['numcuenta']);
        }

        if(isset($newData["numcuentabanco"])){
            $factObj->setNumcuentabanco($newData['numcuentabanco']);
        }

        if(isset($newData["pagado"])){
            $factObj->setPagado($newData['pagado']);
        }

        if(isset($newData["pais"])){
            $factObj->setPais($newData['pais']);
        }

        if(isset($newData["pendiente"])){
            $factObj->setPendiente($newData['pendiente']);
        }

        if(isset($newData["pendientePagar"])){
            $factObj->setPendientePagar($newData['pendientePagar']);
        }

        if(isset($newData["poblacion"])){
            $factObj->setPoblacion($newData['poblacion']);
        }

        if(isset($newData["provincia"])){
            $factObj->setProvincia($newData['provincia']);
        }

        if(isset($newData["saldo"])){
            $factObj->setSaldo($newData['saldo']);
        }

        if(isset($newData["telefono"])){
            $factObj->setTelefono($newData['telefono']);
        }

        if(isset($newData["tipo"])){
            $factObj->setTipo($newData['tipo']);
        }

        if(isset($newData["total"])){
            $factObj->setTotal($newData['total']);
        }

        if(isset($newData["transferenciaDirrecionBanco"])){
            $factObj->setTransferenciaDirrecionBanco($newData['transferenciaDirrecionBanco']);
        }

        if(isset($newData["transferenciaSwift"])){
            $factObj->setTransferenciaSwift($newData['transferenciaSwift']);
        }


        $doctrine->getManager()->persist($factObj);
        $doctrine->getManager()->flush();

        return $this->json(array('success'=> 1, 'msg'=> 'info invoicing saved'));

    }
}
