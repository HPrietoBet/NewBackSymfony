<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriasCampania
 *
 * @ORM\Table(name="categorias_campania")
 * @ORM\Entity(repositoryClass="App\Repository\Main\CategoriasCampaniasRepository")
 */
class CategoriasCampania
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCat;

    /**
     * @var string
     *
     * @ORM\Column(name="titcat", type="string", length=60, nullable=false)
     */
    private $titcat;

    /**
     * @var bool
     *
     * @ORM\Column(name="actcat", type="boolean", nullable=false)
     */
    private $actcat;

    public function getIdCat(): ?int
    {
        return $this->idCat;
    }

    public function getTitcat(): ?string
    {
        return $this->titcat;
    }

    public function setTitcat(string $titcat): self
    {
        $this->titcat = $titcat;

        return $this;
    }

    public function getActcat(): ?bool
    {
        return $this->actcat;
    }

    public function setActcat(bool $actcat): self
    {
        $this->actcat = $actcat;

        return $this;
    }


}
