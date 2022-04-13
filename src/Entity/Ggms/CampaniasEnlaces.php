<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasEnlaces
 *
 * @ORM\Table(name="campanias_enlaces")
 * @ORM\Entity(repositoryClass="App\Repository\Ggms\CampaniasEnlacesRepository")
 */
class CampaniasEnlaces
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
     * @var int
     *
     * @ORM\Column(name="idcampania", type="integer", nullable=false)
     */
    private $idcampania;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_enlace", type="integer", nullable=false)
     */
    private $numeroEnlace;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="string", length=255, nullable=false)
     */
    private $texto;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdcampania(): ?int
    {
        return $this->idcampania;
    }

    public function setIdcampania(int $idcampania): self
    {
        $this->idcampania = $idcampania;

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

    public function getTexto(): ?string
    {
        return $this->texto;
    }

    public function setTexto(string $texto): self
    {
        $this->texto = $texto;

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
