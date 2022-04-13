<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasUsuario
 *
 * @ORM\Table(name="campanias_usuario", indexes={@ORM\Index(name="id_proyecto", columns={"id_proyecto"}), @ORM\Index(name="id_campania", columns={"id_campania"}), @ORM\Index(name="id_usuario", columns={"id_usuario"})})
  * @ORM\Entity(repositoryClass="App\Repository\Ggms\CampaniasUsuarioRepository")
 */
class CampaniasUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_campania_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCampaniaUsuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date", nullable=false)
     */
    private $fechaAlta;

    /**
     * @var int
     *
     * @ORM\Column(name="id_campania", type="integer", nullable=false)
     */
    private $idCampania;

    /**
     * @var string
     *
     * @ORM\Column(name="id_usuario", type="string", length=255, nullable=false)
     */
    private $idUsuario;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_proyecto", type="integer", nullable=true)
     */
    private $idProyecto;

    /**
     * @var float|null
     *
     * @ORM\Column(name="comision", type="float", precision=10, scale=0, nullable=true)
     */
    private $comision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="condiciones", type="string", length=255, nullable=true)
     */
    private $condiciones;

    /**
     * @var string
     *
     * @ORM\Column(name="url_inicial", type="string", length=255, nullable=false)
     */
    private $urlInicial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_cortas", type="text", length=0, nullable=true)
     */
    private $urlCortas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_automaticas", type="text", length=0, nullable=true)
     */
    private $urlAutomaticas;

    /**
     * @var int
     *
     * @ORM\Column(name="clicks_totales", type="integer", nullable=false)
     */
    private $clicksTotales = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    /**
     * @var bool
     *
     * @ORM\Column(name="es_privada", type="boolean", nullable=false)
     */
    private $esPrivada = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="solicitada", type="boolean", nullable=false)
     */
    private $solicitada = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="pendiente", type="boolean", nullable=true)
     */
    private $pendiente = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="condiciones_mejoradas", type="boolean", nullable=false)
     */
    private $condicionesMejoradas = '0';

    /**
     * @var float|null
     *
     * @ORM\Column(name="comision_vip", type="float", precision=10, scale=2, nullable=true)
     */
    private $comisionVip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="condiciones_vip", type="string", length=255, nullable=true)
     */
    private $condicionesVip;

    public function getIdCampaniaUsuario(): ?int
    {
        return $this->idCampaniaUsuario;
    }

    public function getFechaAlta(): ?\DateTimeInterface
    {
        return $this->fechaAlta;
    }

    public function setFechaAlta(\DateTimeInterface $fechaAlta): self
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    public function getIdCampania(): ?int
    {
        return $this->idCampania;
    }

    public function setIdCampania(int $idCampania): self
    {
        $this->idCampania = $idCampania;

        return $this;
    }

    public function getIdUsuario(): ?string
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(string $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdProyecto(): ?int
    {
        return $this->idProyecto;
    }

    public function setIdProyecto(?int $idProyecto): self
    {
        $this->idProyecto = $idProyecto;

        return $this;
    }

    public function getComision(): ?float
    {
        return $this->comision;
    }

    public function setComision(?float $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    public function getCondiciones(): ?string
    {
        return $this->condiciones;
    }

    public function setCondiciones(?string $condiciones): self
    {
        $this->condiciones = $condiciones;

        return $this;
    }

    public function getUrlInicial(): ?string
    {
        return $this->urlInicial;
    }

    public function setUrlInicial(string $urlInicial): self
    {
        $this->urlInicial = $urlInicial;

        return $this;
    }

    public function getUrlCortas(): ?string
    {
        return $this->urlCortas;
    }

    public function setUrlCortas(?string $urlCortas): self
    {
        $this->urlCortas = $urlCortas;

        return $this;
    }

    public function getUrlAutomaticas(): ?string
    {
        return $this->urlAutomaticas;
    }

    public function setUrlAutomaticas(?string $urlAutomaticas): self
    {
        $this->urlAutomaticas = $urlAutomaticas;

        return $this;
    }

    public function getClicksTotales(): ?int
    {
        return $this->clicksTotales;
    }

    public function setClicksTotales(int $clicksTotales): self
    {
        $this->clicksTotales = $clicksTotales;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getEsPrivada(): ?bool
    {
        return $this->esPrivada;
    }

    public function setEsPrivada(bool $esPrivada): self
    {
        $this->esPrivada = $esPrivada;

        return $this;
    }

    public function getSolicitada(): ?bool
    {
        return $this->solicitada;
    }

    public function setSolicitada(bool $solicitada): self
    {
        $this->solicitada = $solicitada;

        return $this;
    }

    public function getPendiente(): ?bool
    {
        return $this->pendiente;
    }

    public function setPendiente(?bool $pendiente): self
    {
        $this->pendiente = $pendiente;

        return $this;
    }

    public function getCondicionesMejoradas(): ?bool
    {
        return $this->condicionesMejoradas;
    }

    public function setCondicionesMejoradas(bool $condicionesMejoradas): self
    {
        $this->condicionesMejoradas = $condicionesMejoradas;

        return $this;
    }

    public function getComisionVip(): ?float
    {
        return $this->comisionVip;
    }

    public function setComisionVip(?float $comisionVip): self
    {
        $this->comisionVip = $comisionVip;

        return $this;
    }

    public function getCondicionesVip(): ?string
    {
        return $this->condicionesVip;
    }

    public function setCondicionesVip(?string $condicionesVip): self
    {
        $this->condicionesVip = $condicionesVip;

        return $this;
    }


}
