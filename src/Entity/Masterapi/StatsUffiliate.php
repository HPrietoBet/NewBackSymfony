<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * StatsUffiliate
 *
 * @ORM\Table(name="stats_uffiliate", indexes={@ORM\Index(name="IDX_A6987D17DD03F01", columns={"connection_id"})})
 * @ORM\Entity
 */
class StatsUffiliate
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
     * @var string|null
     *
     * @ORM\Column(name="brand", type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="player_affinity", type="string", length=255, nullable=true)
     */
    private $playerAffinity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gross_revenue", type="string", length=255, nullable=true)
     */
    private $grossRevenue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commission_type", type="string", length=255, nullable=true)
     */
    private $commissionType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commission_country", type="string", length=255, nullable=true)
     */
    private $commissionCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="player_country", type="string", length=255, nullable=true)
     */
    private $playerCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="anid", type="string", length=255, nullable=true)
     */
    private $anid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="player_device", type="string", length=255, nullable=true)
     */
    private $playerDevice;

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
