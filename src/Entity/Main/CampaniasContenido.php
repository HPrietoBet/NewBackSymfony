<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasContenido
 *
 * @ORM\Table(name="campanias_contenido")
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasContenidoRepository")
 */
class CampaniasContenido
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
     * @ORM\Column(name="idiomas", type="string", length=10, nullable=false)
     */
    private $idiomas;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text", length=0, nullable=false)
     */
    private $contenido;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdiomas(): ?string
    {
        return $this->idiomas;
    }

    public function setIdiomas(string $idiomas): self
    {
        $this->idiomas = $idiomas;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }


}
