<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadisticasApi
 *
 * @ORM\Table(name="estadisticas_api", indexes={@ORM\Index(name="ix_connection_id", columns={"connection_id"}), @ORM\Index(name="ix_sub_id", columns={"sub_id"}), @ORM\Index(name="ix_fecha", columns={"fecha"}), @ORM\Index(name="id_campania_usuario", columns={"id_campania_usuario"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\EstadisticasAPIRepository")
 */
class EstadisticasApi
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
     * @var string
     *
     * @ORM\Column(name="fuente_marketing", type="string", length=255, nullable=false)
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
     * @var float
     *
     * @ORM\Column(name="comision_generada", type="float", precision=9, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $comisionGenerada = 0.00;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubId(): ?string
    {
        return $this->subId;
    }

    public function setSubId(?string $subId): self
    {
        $this->subId = $subId;

        return $this;
    }

    public function getIdCampaniaUsuario(): ?int
    {
        return $this->idCampaniaUsuario;
    }

    public function setIdCampaniaUsuario(int $idCampaniaUsuario): self
    {
        $this->idCampaniaUsuario = $idCampaniaUsuario;

        return $this;
    }

    public function getFuenteMarketing(): ?string
    {
        return $this->fuenteMarketing;
    }

    public function setFuenteMarketing(string $fuenteMarketing): self
    {
        $this->fuenteMarketing = $fuenteMarketing;

        return $this;
    }

    public function getRegistros(): ?int
    {
        return $this->registros;
    }

    public function setRegistros(int $registros): self
    {
        $this->registros = $registros;

        return $this;
    }

    public function getDepositantesPrimeraVez(): ?int
    {
        return $this->depositantesPrimeraVez;
    }

    public function setDepositantesPrimeraVez(int $depositantesPrimeraVez): self
    {
        $this->depositantesPrimeraVez = $depositantesPrimeraVez;

        return $this;
    }

    public function getCpaGenerados(): ?int
    {
        return $this->cpaGenerados;
    }

    public function setCpaGenerados(int $cpaGenerados): self
    {
        $this->cpaGenerados = $cpaGenerados;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getConnectionId(): ?string
    {
        return $this->connectionId;
    }

    public function setConnectionId(string $connectionId): self
    {
        $this->connectionId = $connectionId;

        return $this;
    }

    public function getComisionGenerada(): ?float
    {
        return $this->comisionGenerada;
    }

    public function setComisionGenerada(float $comisionGenerada): self
    {
        $this->comisionGenerada = $comisionGenerada;

        return $this;
    }

    public function getClicksUnicos(): ?int
    {
        return $this->clicksUnicos;
    }

    public function setClicksUnicos(?int $clicksUnicos): self
    {
        $this->clicksUnicos = $clicksUnicos;

        return $this;
    }

    public function getClicksTotales(): ?int
    {
        return $this->clicksTotales;
    }

    public function setClicksTotales(?int $clicksTotales): self
    {
        $this->clicksTotales = $clicksTotales;

        return $this;
    }


}
