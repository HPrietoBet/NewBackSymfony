<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasIapuestas
 *
 * @ORM\Table(name="casas_iapuestas", indexes={@ORM\Index(name="ix_id_iapuestas", columns={"id_iapuestas"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CasasIApuestasRepository")
 */
class CasasIapuestas
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
     * @ORM\Column(name="id_iapuestas", type="integer", nullable=false)
     */
    private $idIapuestas;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_iapuestas", type="string", length=255, nullable=false)
     */
    private $nombreIapuestas;

    /**
     * @var string
     *
     * @ORM\Column(name="version_iapuestas", type="string", length=255, nullable=false)
     */
    private $versionIapuestas;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false, options={"default"="1"})
     */
    private $activo = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdIapuestas(): ?int
    {
        return $this->idIapuestas;
    }

    public function setIdIapuestas(int $idIapuestas): self
    {
        $this->idIapuestas = $idIapuestas;

        return $this;
    }

    public function getNombreIapuestas(): ?string
    {
        return $this->nombreIapuestas;
    }

    public function setNombreIapuestas(string $nombreIapuestas): self
    {
        $this->nombreIapuestas = $nombreIapuestas;

        return $this;
    }

    public function getVersionIapuestas(): ?string
    {
        return $this->versionIapuestas;
    }

    public function setVersionIapuestas(string $versionIapuestas): self
    {
        $this->versionIapuestas = $versionIapuestas;

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
