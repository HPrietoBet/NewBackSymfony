<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * StatsTopConvert
 *
 * @ORM\Table(name="stats_top_convert", indexes={@ORM\Index(name="IDX_8924CA84DD03F01", columns={"connection_id"})})
 * @ORM\Entity
 */
class StatsTopConvert
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
     * @ORM\Column(name="full_name", type="string", length=255, nullable=true)
     */
    private $fullName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country_id", type="string", length=255, nullable=true)
     */
    private $countryId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var int|null
     *
     * @ORM\Column(name="affiliate_id", type="integer", nullable=true)
     */
    private $affiliateId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated", type="date", nullable=true)
     */
    private $updated;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hash", type="string", length=255, nullable=true)
     */
    private $hash;

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
