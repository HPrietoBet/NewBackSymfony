<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAfiliadosVariables
 *
 * @ORM\Table(name="usuarios_afiliados_variables")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosAfiliadosVariablesRepository")
 */
class UsuariosAfiliadosVariables
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_variables", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVariables;

    /**
     * @var int
     *
     * @ORM\Column(name="id_camp_bid", type="integer", nullable=false)
     */
    private $idCampBid;

    /**
     * @var int
     *
     * @ORM\Column(name="id_camp", type="integer", nullable=false)
     */
    private $idCamp;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user_afiliado", type="integer", nullable=false)
     */
    private $idUserAfiliado;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bid", type="text", length=65535, nullable=true)
     */
    private $bid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pid", type="text", length=65535, nullable=true)
     */
    private $pid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bssid", type="text", length=65535, nullable=true)
     */
    private $bssid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bsmid", type="text", length=65535, nullable=true)
     */
    private $bsmid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_inicial", type="text", length=65535, nullable=true)
     */
    private $urlInicial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_mobile", type="text", length=65535, nullable=true)
     */
    private $urlMobile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_generada", type="text", length=65535, nullable=true)
     */
    private $urlGenerada;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_corta", type="text", length=65535, nullable=true)
     */
    private $urlCorta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_automatica", type="text", length=65535, nullable=true)
     */
    private $urlAutomatica;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo_afiliado", type="boolean", nullable=false)
     */
    private $activoAfiliado;

    /**
     * @var bool
     *
     * @ORM\Column(name="actsport", type="boolean", nullable=false)
     */
    private $actsport;

    public function getIdVariables(): ?int
    {
        return $this->idVariables;
    }

    public function getIdCampBid(): ?int
    {
        return $this->idCampBid;
    }

    public function setIdCampBid(int $idCampBid): self
    {
        $this->idCampBid = $idCampBid;

        return $this;
    }

    public function getIdCamp(): ?int
    {
        return $this->idCamp;
    }

    public function setIdCamp(int $idCamp): self
    {
        $this->idCamp = $idCamp;

        return $this;
    }

    public function getIdUserAfiliado(): ?int
    {
        return $this->idUserAfiliado;
    }

    public function setIdUserAfiliado(int $idUserAfiliado): self
    {
        $this->idUserAfiliado = $idUserAfiliado;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getBid(): ?string
    {
        return $this->bid;
    }

    public function setBid(?string $bid): self
    {
        $this->bid = $bid;

        return $this;
    }

    public function getPid(): ?string
    {
        return $this->pid;
    }

    public function setPid(?string $pid): self
    {
        $this->pid = $pid;

        return $this;
    }

    public function getBssid(): ?string
    {
        return $this->bssid;
    }

    public function setBssid(?string $bssid): self
    {
        $this->bssid = $bssid;

        return $this;
    }

    public function getBsmid(): ?string
    {
        return $this->bsmid;
    }

    public function setBsmid(?string $bsmid): self
    {
        $this->bsmid = $bsmid;

        return $this;
    }

    public function getUrlInicial(): ?string
    {
        return $this->urlInicial;
    }

    public function setUrlInicial(?string $urlInicial): self
    {
        $this->urlInicial = $urlInicial;

        return $this;
    }

    public function getUrlMobile(): ?string
    {
        return $this->urlMobile;
    }

    public function setUrlMobile(?string $urlMobile): self
    {
        $this->urlMobile = $urlMobile;

        return $this;
    }

    public function getUrlGenerada(): ?string
    {
        return $this->urlGenerada;
    }

    public function setUrlGenerada(?string $urlGenerada): self
    {
        $this->urlGenerada = $urlGenerada;

        return $this;
    }

    public function getUrlCorta(): ?string
    {
        return $this->urlCorta;
    }

    public function setUrlCorta(?string $urlCorta): self
    {
        $this->urlCorta = $urlCorta;

        return $this;
    }

    public function getUrlAutomatica(): ?string
    {
        return $this->urlAutomatica;
    }

    public function setUrlAutomatica(?string $urlAutomatica): self
    {
        $this->urlAutomatica = $urlAutomatica;

        return $this;
    }

    public function getActivoAfiliado(): ?bool
    {
        return $this->activoAfiliado;
    }

    public function setActivoAfiliado(bool $activoAfiliado): self
    {
        $this->activoAfiliado = $activoAfiliado;

        return $this;
    }

    public function getActsport(): ?bool
    {
        return $this->actsport;
    }

    public function setActsport(bool $actsport): self
    {
        $this->actsport = $actsport;

        return $this;
    }


}
