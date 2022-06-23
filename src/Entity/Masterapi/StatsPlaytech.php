<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * StatsPlaytech
 *
 * @ORM\Table(name="stats_playtech", indexes={@ORM\Index(name="IDX_B54E2FDD03F01", columns={"connection_id"})})
 * @ORM\Entity
 */
class StatsPlaytech
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
     * @var string
     *
     * @ORM\Column(name="sub_id", type="string", length=255, nullable=false)
     */
    private $subId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clicks_unicos", type="integer", nullable=true)
     */
    private $clicksUnicos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clicks_totales", type="integer", nullable=true)
     */
    private $clicksTotales;

    /**
     * @var int|null
     *
     * @ORM\Column(name="visitas_unicas", type="integer", nullable=true)
     */
    private $visitasUnicas;

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
     * @var int
     *
     * @ORM\Column(name="cpa_generados", type="integer", nullable=false)
     */
    private $cpaGenerados;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_usuarios_depositos", type="integer", nullable=true)
     */
    private $numeroUsuariosDepositos;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cantidad_depositada", type="float", precision=10, scale=0, nullable=true)
     */
    private $cantidadDepositada;

    /**
     * @var string|null
     *
     * @ORM\Column(name="non_unique_impressions", type="string", length=255, nullable=true)
     */
    private $nonUniqueImpressions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="non_unique_clicks", type="string", length=255, nullable=true)
     */
    private $nonUniqueClicks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ctr", type="string", length=255, nullable=true)
     */
    private $ctr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="click_signup_ratio", type="string", length=255, nullable=true)
     */
    private $clickSignupRatio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="merchant", type="string", length=255, nullable=true)
     */
    private $merchant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="deposit_cnt", type="string", length=255, nullable=true)
     */
    private $depositCnt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="deposit_amt", type="string", length=255, nullable=true)
     */
    private $depositAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="withdrawal_amt", type="string", length=255, nullable=true)
     */
    private $withdrawalAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="activations_cnt", type="string", length=255, nullable=true)
     */
    private $activationsCnt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sportsbook_activations_cnt", type="string", length=255, nullable=true)
     */
    private $sportsbookActivationsCnt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="casino_activations_cnt", type="string", length=255, nullable=true)
     */
    private $casinoActivationsCnt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comission", type="string", length=255, nullable=true)
     */
    private $comission;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cpa_comission", type="string", length=255, nullable=true)
     */
    private $cpaComission;

    /**
     * @var string|null
     *
     * @ORM\Column(name="flat_comission", type="string", length=255, nullable=true)
     */
    private $flatComission;

    /**
     * @var string|null
     *
     * @ORM\Column(name="impresssion_comission", type="string", length=255, nullable=true)
     */
    private $impresssionComission;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bets", type="string", length=255, nullable=true)
     */
    private $bets;

    /**
     * @var string|null
     *
     * @ORM\Column(name="jackpot_bets", type="string", length=255, nullable=true)
     */
    private $jackpotBets;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bonuses", type="string", length=255, nullable=true)
     */
    private $bonuses;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rfd_amt", type="string", length=255, nullable=true)
     */
    private $rfdAmt;

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
     * @var \ApiConnections
     *
     * @ORM\ManyToOne(targetEntity="ApiConnections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="connection_id", referencedColumnName="id")
     * })
     */
    private $connection;


}
