<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faqs
 *
 * @ORM\Table(name="faqs")
  * @ORM\Entity(repositoryClass="App\Repository\Ggms\FaqsRepository")
 */
class Faqs
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_es", type="string", length=100, nullable=false)
     */
    private $tituloEs;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_es", type="text", length=65535, nullable=false)
     */
    private $contenidoEs;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     */
    private $imagen;

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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getTituloEs(): ?string
    {
        return $this->tituloEs;
    }

    public function setTituloEs(string $tituloEs): self
    {
        $this->tituloEs = $tituloEs;

        return $this;
    }

    public function getContenidoEs(): ?string
    {
        return $this->contenidoEs;
    }

    public function setContenidoEs(string $contenidoEs): self
    {
        $this->contenidoEs = $contenidoEs;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

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
