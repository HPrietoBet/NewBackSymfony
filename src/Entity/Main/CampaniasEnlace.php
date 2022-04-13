<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasEnlace
 *
 * @ORM\Table(name="campanias_enlace", indexes={@ORM\Index(name="ix_id_campania", columns={"id_campania"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasEnlaceRepository")
 */
class CampaniasEnlace
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_enlace", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEnlace;

    /**
     * @var int
     *
     * @ORM\Column(name="id_campania", type="integer", nullable=false)
     */
    private $idCampania;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_enlace", type="integer", nullable=false)
     */
    private $numeroEnlace;

    /**
     * @var string
     *
     * @ORM\Column(name="texto_es", type="string", length=255, nullable=false)
     */
    private $textoEs;

    /**
     * @var string
     *
     * @ORM\Column(name="texto_en", type="string", length=255, nullable=false)
     */
    private $textoEn;

    /**
     * @var string
     *
     * @ORM\Column(name="url_inicial", type="string", length=255, nullable=false)
     */
    private $urlInicial;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    public function getIdEnlace(): ?int
    {
        return $this->idEnlace;
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

    public function getNumeroEnlace(): ?int
    {
        return $this->numeroEnlace;
    }

    public function setNumeroEnlace(int $numeroEnlace): self
    {
        $this->numeroEnlace = $numeroEnlace;

        return $this;
    }

    public function getTextoEs(): ?string
    {
        return $this->textoEs;
    }

    public function setTextoEs(string $textoEs): self
    {
        $this->textoEs = $textoEs;

        return $this;
    }

    public function getTextoEn(): ?string
    {
        return $this->textoEn;
    }

    public function setTextoEn(string $textoEn): self
    {
        $this->textoEn = $textoEn;

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

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }


}
