<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * VersionesIapuestas
 *
 * @ORM\Table(name="versiones_iapuestas")
 * @ORM\Entity(repositoryClass="App\Repository\Main\VersionesIApuestasRepository")
 */
class VersionesIapuestas
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
     * @ORM\Column(name="version", type="string", length=255, nullable=false)
     */
    private $version;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer", nullable=false)
     */
    private $activo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getActivo(): ?int
    {
        return $this->activo;
    }

    public function setActivo(int $activo): self
    {
        $this->activo = $activo;

        return $this;
    }


}
