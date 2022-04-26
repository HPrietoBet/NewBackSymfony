<?php

namespace App\Entity\Old;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatsApi
 *
 * @ORM\Table(name="stats_api", indexes={@ORM\Index(name="fuente_marketing", columns={"fuente_marketing"}), @ORM\Index(name="fecha", columns={"fecha"}), @ORM\Index(name="connection_id", columns={"connection_id"}), @ORM\Index(name="sub_id", columns={"sub_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\Old\StatsApiRepository")
 */
class StatsApi
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
     * @ORM\Column(name="sub_id", type="string", length=255, nullable=true)
     */
    private $subId;

    /**
     * @var int
     *
     * @ORM\Column(name="id_campania_usuario", type="integer", nullable=false)
     */
    private $idCampaniaUsuario = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fuente_marketing", type="string", length=255, nullable=true)
     */
    private $fuenteMarketing;

    /**
     * @var int
     *
     * @ORM\Column(name="registros", type="integer", nullable=false)
     */
    private $registros = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="depositantes_primera_vez", type="integer", nullable=false)
     */
    private $depositantesPrimeraVez = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="cpa_generados", type="integer", nullable=false)
     */
    private $cpaGenerados = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="comision_generada", type="decimal", precision=10, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $comisionGenerada = '0.00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="connection_id", type="string", length=255, nullable=false)
     */
    private $connectionId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="clicks_unicos", type="integer", nullable=true)
     */
    private $clicksUnicos = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="clicks_totales", type="integer", nullable=true)
     */
    private $clicksTotales = '0';


}
