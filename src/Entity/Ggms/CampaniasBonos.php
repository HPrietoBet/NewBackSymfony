<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasBonos
 *
 * @ORM\Table(name="campanias_bonos")
 * @ORM\Entity(repositoryClass="App\Repository\Ggms\CampaniasBonosRepository")
 */
class CampaniasBonos
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
     * @ORM\Column(name="id_campania", type="integer", nullable=false)
     */
    private $idCampania;

    /**
     * @var int
     *
     * @ORM\Column(name="id_proyecto", type="integer", nullable=false)
     */
    private $idProyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="bono", type="string", length=255, nullable=false)
     */
    private $bono;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdProyecto(): ?int
    {
        return $this->idProyecto;
    }

    public function setIdProyecto(int $idProyecto): self
    {
        $this->idProyecto = $idProyecto;

        return $this;
    }

    public function getBono(): ?string
    {
        return $this->bono;
    }

    public function setBono(string $bono): self
    {
        $this->bono = $bono;

        return $this;
    }


}
