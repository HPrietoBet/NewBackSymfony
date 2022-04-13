<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAfiliadosSuper
 *
 * @ORM\Table(name="usuarios_afiliados_super")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosAfiliadosSuperRepository")
 */
class UsuariosAfiliadosSuper
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_camp_bid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCampBid;

    /**
     * @var int
     *
     * @ORM\Column(name="id_camp", type="integer", nullable=false)
     */
    private $idCamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texto_es", type="text", length=65535, nullable=true)
     */
    private $textoEs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="texto_en", type="text", length=65535, nullable=true)
     */
    private $textoEn;

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
     * @ORM\Column(name="bid", type="text", length=65535, nullable=true)
     */
    private $bid;

    /**
     * @var bool
     *
     * @ORM\Column(name="actactivo", type="boolean", nullable=false)
     */
    private $actactivo;

    /**
     * @var bool
     *
     * @ORM\Column(name="actsport", type="boolean", nullable=false)
     */
    private $actsport;

    public function getIdCampBid(): ?int
    {
        return $this->idCampBid;
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

    public function getTextoEs(): ?string
    {
        return $this->textoEs;
    }

    public function setTextoEs(?string $textoEs): self
    {
        $this->textoEs = $textoEs;

        return $this;
    }

    public function getTextoEn(): ?string
    {
        return $this->textoEn;
    }

    public function setTextoEn(?string $textoEn): self
    {
        $this->textoEn = $textoEn;

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

    public function getBid(): ?string
    {
        return $this->bid;
    }

    public function setBid(?string $bid): self
    {
        $this->bid = $bid;

        return $this;
    }

    public function getActactivo(): ?bool
    {
        return $this->actactivo;
    }

    public function setActactivo(bool $actactivo): self
    {
        $this->actactivo = $actactivo;

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
