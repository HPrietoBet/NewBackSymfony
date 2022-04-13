<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConexionesApi
 *
 * @ORM\Table(name="conexiones_api")
 * @ORM\Entity(repositoryClass="App\Repository\Main\ConexionesApiRepository")
 */
class ConexionesApi
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
     * @ORM\Column(name="nombre_api", type="string", length=255, nullable=false)
     */
    private $nombreApi;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_publico", type="string", length=255, nullable=false)
     */
    private $nombrePublico;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer", nullable=false, options={"default"="1"})
     */
    private $activo = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreApi(): ?string
    {
        return $this->nombreApi;
    }

    public function setNombreApi(string $nombreApi): self
    {
        $this->nombreApi = $nombreApi;

        return $this;
    }

    public function getNombrePublico(): ?string
    {
        return $this->nombrePublico;
    }

    public function setNombrePublico(string $nombrePublico): self
    {
        $this->nombrePublico = $nombrePublico;

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
