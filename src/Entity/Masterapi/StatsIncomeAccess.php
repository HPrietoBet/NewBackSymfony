<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * StatsIncomeAccess
 *
 * @ORM\Table(name="stats_income_access", indexes={@ORM\Index(name="IDX_AC341A32DD03F01", columns={"connection_id"})})
 * @ORM\Entity
 */
class StatsIncomeAccess
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
     * @ORM\Column(name="fuente_marketing", type="string", length=255, nullable=false)
     */
    private $fuenteMarketing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marketing_name", type="string", length=255, nullable=true)
     */
    private $marketingName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clicks_totales", type="integer", nullable=true)
     */
    private $clicksTotales;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_id", type="string", length=255, nullable=false)
     */
    private $subId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="visitas_totales", type="integer", nullable=true)
     */
    private $visitasTotales;

    /**
     * @var int
     *
     * @ORM\Column(name="registros", type="integer", nullable=false)
     */
    private $registros;

    /**
     * @var int
     *
     * @ORM\Column(name="depositantes_primera_vez", type="integer", nullable=false)
     */
    private $depositantesPrimeraVez;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cpa_generados", type="integer", nullable=true)
     */
    private $cpaGenerados;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rowid", type="string", length=255, nullable=true)
     */
    private $rowid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="currencysymbol", type="string", length=4, nullable=true)
     */
    private $currencysymbol;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clientes_activos_primera_vez", type="integer", nullable=true)
     */
    private $clientesActivosPrimeraVez;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clientes_activos", type="integer", nullable=true)
     */
    private $clientesActivos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cantidad_nuevos_depositantes", type="integer", nullable=true)
     */
    private $cantidadNuevosDepositantes;

    /**
     * @var float|null
     *
     * @ORM\Column(name="numero_usuarios_depositantes", type="float", precision=10, scale=0, nullable=true)
     */
    private $numeroUsuariosDepositantes;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cantidad_depositada", type="float", precision=10, scale=0, nullable=true)
     */
    private $cantidadDepositada;

    /**
     * @var float|null
     *
     * @ORM\Column(name="comision_rs", type="float", precision=10, scale=0, nullable=true)
     */
    private $comisionRs;

    /**
     * @var float|null
     *
     * @ORM\Column(name="comision_cpa", type="float", precision=10, scale=0, nullable=true)
     */
    private $comisionCpa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clicks_unicos", type="integer", nullable=true)
     */
    private $clicksUnicos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="visitas_unicas", type="integer", nullable=true)
     */
    private $visitasUnicas;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cantidad_apostada", type="float", precision=10, scale=0, nullable=true)
     */
    private $cantidadApostada;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_usuarios_apostantes", type="integer", nullable=true)
     */
    private $numeroUsuariosApostantes;

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
