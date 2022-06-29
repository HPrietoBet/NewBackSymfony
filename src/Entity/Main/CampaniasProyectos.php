<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasProyectos
 *
 * @ORM\Table(name="campanias_proyectos")
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasProyectosRepository")
 */
class CampaniasProyectos
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
     * @ORM\Column(type="integer", name="id_proyecto",  nullable=false)
     */
    private $idProyecto;

    /**
     * @var int
     *
     * @ORM\Column(type="integer",  name="id_campania",  nullable=false)
     */
    private $idCampania;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="activo", nullable=false)
     */
    private $activo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIdProyecto(): ?int
    {
        return $this->idProyecto;
    }

    public function setIdProyecto(int $idProyecto): self
    {
        $this->idProyecto = $idProyecto;

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
