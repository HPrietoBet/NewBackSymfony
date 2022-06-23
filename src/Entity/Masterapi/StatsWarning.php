<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * StatsWarning
 *
 * @ORM\Table(name="stats_warning", indexes={@ORM\Index(name="IDX_D9F4DD9B2872F8F4", columns={"api_type_id"}), @ORM\Index(name="IDX_D9F4DD9BDD03F01", columns={"connection_id"})})
 * @ORM\Entity
 */
class StatsWarning
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
     * @var string|null
     *
     * @ORM\Column(name="id_afiliado", type="string", length=255, nullable=true)
     */
    private $idAfiliado;

    /**
     * @var string
     *
     * @ORM\Column(name="fuente_marketing", type="string", length=255, nullable=false)
     */
    private $fuenteMarketing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sub_id", type="string", length=255, nullable=true)
     */
    private $subId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

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
     * @var int
     *
     * @ORM\Column(name="external_id", type="integer", nullable=false)
     */
    private $externalId;

    /**
     * @var \ApiConnections
     *
     * @ORM\ManyToOne(targetEntity="ApiConnections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="connection_id", referencedColumnName="id")
     * })
     */
    private $connection;

    /**
     * @var \ApiTypes
     *
     * @ORM\ManyToOne(targetEntity="ApiTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="api_type_id", referencedColumnName="id")
     * })
     */
    private $apiType;


}
