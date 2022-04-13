<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasCompetidores
 *
 * @ORM\Table(name="casas_competidores")
 * @ORM\Entity(repositoryClass="App\Repository\Main\CasasComptenidoresRepository")
s */
class CasasCompetidores
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var array
     *
     * @ORM\Column(name="paises", type="json", nullable=false)
     */
    private $paises;

    /**
     * @var bool
     *
     * @ORM\Column(name="es_global", type="boolean", nullable=false)
     */
    private $esGlobal = '0';

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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getPaises(): ?array
    {
        return $this->paises;
    }

    public function setPaises(array $paises): self
    {
        $this->paises = $paises;

        return $this;
    }

    public function getEsGlobal(): ?bool
    {
        return $this->esGlobal;
    }

    public function setEsGlobal(bool $esGlobal): self
    {
        $this->esGlobal = $esGlobal;

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
