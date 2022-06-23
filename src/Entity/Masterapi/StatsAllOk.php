<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * StatsAllOk
 *
 * @ORM\Table(name="stats_all_ok_new")
 * @ORM\Entity(repositoryClass="App\Repository\Masterapi\StatsAllOkRepository")
 */
class StatsAllOk
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="string", nullable=false, name="id")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fecha", type="string", nullable=true)
     */
    private $fecha;

    /**
     * @var int|null
     *
     * @ORM\Column(name="connection_id", type="integer", nullable=true)
     */
    private $connectionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fuente_marketing", type="string", nullable=true)
     */
    private $fuenteMarketing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sub_id", type="string", nullable=true)
     */
    private $subId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="registros", type="integer", nullable=true)
     */
    private $registros;

    /**
     * @var int|null
     *
     * @ORM\Column(name="depositantes_primera_vez", type="integer", nullable=true)
     */
    private $depositantes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cpa_generados", type="integer", nullable=true)
     */
    private $cpa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="connection_api", type="string", nullable=true)
     */
    private $connectionApi;

    function getId(){
        return $this->id;
    }

    function getFecha(){
        return $this->fecha;
    }

    function getConnectionId(){
        return $this->connectionId;
    }

    function getConnectionApi(){
        return $this->connectionApi;
    }

    function getSubId(){
        return $this->subId;
    }

    function getDepositantes(){
        return $this->depositantes;
    }

    function getRegistros(){
        return $this->registros;
    }

    function getCpa(){
        return $this->cpa;
    }

    function getFuente(){
        return $this->fuenteMarketing;
    }

}
