<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * StatsNetreferplus
 *
 * @ORM\Table(name="stats_netreferplus", indexes={@ORM\Index(name="IDX_2B5336AEDD03F01", columns={"connection_id"})})
 * @ORM\Entity
 */
class StatsNetreferplus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="id_afiliado", type="string", length=255, nullable=false)
     */
    private $idAfiliado;

    /**
     * @var string
     *
     * @ORM\Column(name="fuente_marketing", type="string", length=255, nullable=false)
     */
    private $fuenteMarketing;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_id", type="string", length=255, nullable=false)
     */
    private $subId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clicks_totales", type="integer", nullable=true)
     */
    private $clicksTotales;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clicks_unicos", type="integer", nullable=true)
     */
    private $clicksUnicos;

    /**
     * @var int
     *
     * @ORM\Column(name="registros", type="integer", nullable=false)
     */
    private $registros;

    /**
     * @var int|null
     *
     * @ORM\Column(name="usuarios_depositantes", type="integer", nullable=true)
     */
    private $usuariosDepositantes;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ingresos_netos", type="float", precision=10, scale=0, nullable=true)
     */
    private $ingresosNetos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cpa_generados", type="integer", nullable=true)
     */
    private $cpaGenerados = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="depositantes_primera_vez", type="integer", nullable=false)
     */
    private $depositantesPrimeraVez;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_name", type="string", length=255, nullable=true)
     */
    private $productName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="brand_name", type="string", length=255, nullable=true)
     */
    private $brandName;

    /**
     * @var float
     *
     * @ORM\Column(name="chargebacks", type="float", precision=10, scale=0, nullable=false)
     */
    private $chargebacks;

    /**
     * @var float
     *
     * @ORM\Column(name="comision_rs", type="float", precision=10, scale=0, nullable=false)
     */
    private $comisionRs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marketing_name", type="string", length=255, nullable=true)
     */
    private $marketingName;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cantidad_depositada", type="float", precision=10, scale=0, nullable=true)
     */
    private $cantidadDepositada;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cantidad_nuevos_depositantes", type="integer", nullable=true)
     */
    private $cantidadNuevosDepositantes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clientes_activos", type="integer", nullable=true)
     */
    private $clientesActivos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clientes_activos_primera_vez", type="integer", nullable=true)
     */
    private $clientesActivosPrimeraVez;

    /**
     * @var float|null
     *
     * @ORM\Column(name="comision_cpa", type="float", precision=10, scale=0, nullable=true)
     */
    private $comisionCpa;

    /**
     * @var int
     *
     * @ORM\Column(name="visitas_totales", type="integer", nullable=false)
     */
    private $visitasTotales;

    /**
     * @var int
     *
     * @ORM\Column(name="visitas_unicas", type="integer", nullable=false)
     */
    private $visitasUnicas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="media_id", type="string", length=255, nullable=true)
     */
    private $mediaId;

    /**
     * @var \ApiConnections
     *
     * @ORM\ManyToOne(targetEntity="ApiConnections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="connection_id", referencedColumnName="id")
     * })
     */
    private $connection;


}
