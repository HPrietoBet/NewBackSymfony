<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAfiliadosSport
 *
 * @ORM\Table(name="usuarios_afiliados_sport")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuarisAfiliadosSportRepository")
 */
class UsuariosAfiliadosSport
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_sport", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSport;

    /**
     * @var int
     *
     * @ORM\Column(name="id_variable", type="integer", nullable=false)
     */
    private $idVariable;

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
     * @ORM\Column(name="titulo_informativo", type="text", length=65535, nullable=true)
     */
    private $tituloInformativo;

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
     * @ORM\Column(name="url_inicial_usuario", type="text", length=65535, nullable=true)
     */
    private $urlInicialUsuario;

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

    public function getIdSport(): ?int
    {
        return $this->idSport;
    }

    public function getIdVariable(): ?int
    {
        return $this->idVariable;
    }

    public function setIdVariable(int $idVariable): self
    {
        $this->idVariable = $idVariable;

        return $this;
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

    public function getTituloInformativo(): ?string
    {
        return $this->tituloInformativo;
    }

    public function setTituloInformativo(?string $tituloInformativo): self
    {
        $this->tituloInformativo = $tituloInformativo;

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

    public function getUrlInicialUsuario(): ?string
    {
        return $this->urlInicialUsuario;
    }

    public function setUrlInicialUsuario(?string $urlInicialUsuario): self
    {
        $this->urlInicialUsuario = $urlInicialUsuario;

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


}
