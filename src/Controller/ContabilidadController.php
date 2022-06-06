<?php

namespace App\Controller;

use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\FacturacionConsolidada;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContabilidadController extends AbstractController
{
    public $year;
    public $month;

    /**
     * @Route("/contabilidad/load", name="app_contabilidad")
     */
    public function index()
    {
        $this->year = date('Y');
        $this->month = date('m');
        $data = $this->prepareData($this->getClientes(), $this->getComisiones());
        echo 'Insertados / actualizados : '.$this->persisteConsolidateData($data). ' Registros';
        echo PHP_EOL.'Datos insertados/actualizados:';
        echo '<pre>'.print_r($data, true).'</pre>';
        die();
    }

    public function getComisiones(){
        $comisiones_returned = array('total' => 0);

        $conn = $this->em->getConnection();
        $sql = "SELECT
                    cda.id_casa id_casa,
                    cda.titcasa as casa ,
                    sum(comision_generada) as comision ,
                    (select GROUP_CONCAT(id)  from campanias c2 where c2.id_casa  = cda.id_casa and actcamp = 1) as campanias_activas
                FROM estadisticas_api ea
                join campanias_usuario cu  on ea.id_campania_usuario  = cu.id_campania_usuario
                join campanias c  on c.id  = cu.id_campania
                join casas_de_apuestas cda on cda.id_casa = c.id_casa
                WHERE
                    MONTH(fecha) =  {$this->month}
                    AND YEAR(fecha) = {$this->year}
                    AND actcasa  = 1
                GROUP BY cda.id_casa";
        $stmt = $conn->prepare($sql);
        $comisiones =  $stmt->execute()->fetchAll();

        foreach ($comisiones as $comision) {
            if (!empty($comision)) {
                $comisiones_returned[$comision['id_casa']]['casa'] = $comision['casa'];
                $comisiones_returned[$comision['id_casa']]['comision'] = (float)$comision['comision'];
                $comisiones_returned[$comision['id_casa']]['campanias'] = $comision['campanias_activas'];
                $comisiones_returned['total'] += (float)$comision['comision'];
            }
        }

        $comisiones_returned['total'] = number_format($comisiones_returned['total'], 2);
        return $comisiones_returned;

    }

    public function getClientes(){

        $clientes = $this->serializer->normalize($this->em->getRepository(CasasDeApuestas::class)->findBy(['actcasa' => 1]));
        $clientes_returned = array();

        foreach ($clientes as $cliente) {
            $clientes_returned[$cliente['idCasa']] = $cliente;
            $variosPaises = explode(',',strtoupper($cliente['idCasPais']));
            if(count($variosPaises) > 2){
                $variosPaises_Txt = $variosPaises[0].', '.$variosPaises[1].', '.$variosPaises[2];
            }else{
                $variosPaises_Txt =join(',', $variosPaises);
            }

            $clientes_returned[$cliente['idCasa']]['pais'] = count(explode(',', $cliente['idCasPais'])) > 1 ? strtoupper($variosPaises_Txt) : strtoupper(explode(',', $cliente['idCasPais'])[0]);

        }
        return $clientes_returned;
    }

    public function prepareData($clientes, $comisiones){
        $dataConsolidar = array();

        foreach ($clientes as $cliente) {
            $dataConsolidar[] = array(
                'id_casa' => $cliente['idCasa'],
                'casa' => $cliente['titcasa'],
                'campanias_activas' => $comisiones[$cliente['idCasa']]['campanias'] ?? 0,
                'currency' => $cliente['currency'],
                'requiere_factura' => $cliente['requiereFactura'],
                'datos_facturacion' => $cliente['datosFacturacion'],
                'impuestos' => $cliente['impuestos'],
                'pais' => $cliente['pais'],
                'com_bet' => $comisiones[$cliente['idCasa']]['comision'] ?? 0,
                'created' => date('Y-m-d H:i:s'),
            );
        }
        return $dataConsolidar;
    }

    public function persisteConsolidateData($dataConsolidar){
        $reg = 0;
        foreach ($dataConsolidar as $data) {
            $facObj = $this->em->getRepository(FacturacionConsolidada::class)->findOneBy(['month' => $this->month, 'year'=>$this->year, 'idCasa'=>$data['id_casa']]);
            if(empty($facObj)){
                $facObj = new FacturacionConsolidada();
            }
            $facObj->setIdCasa($data['id_casa']);
            $facObj->setMonth($this->month);
            $facObj->setYear($this->year);
            $facObj->setCasa($data['casa']);
            $facObj->setCampaniasActivas($data['campanias_activas']);
            $facObj->setCurrency($data['currency']);
            $facObj->setImpuestos($data['impuestos']);
            $facObj->setRequiereFactura($data['requiere_factura']);
            $facObj->setDatosFacturacion($data['datos_facturacion']);
            $facObj->setPais($data['pais']);
            $facObj->setComBet($data['com_bet']);
            $facObj->setCreated(date('Y-m-d H:i:s'));
            $facObj->setModify(date('Y-m-d H:i:s'));

            $this->em->getManager()->persist($facObj);
            $this->em->getManager()->flush();

            $reg++;

        }
        return $reg;
    }
}
