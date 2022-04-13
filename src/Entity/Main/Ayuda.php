<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ayuda
 *
 * @ORM\Table(name="ayuda", indexes={@ORM\Index(name="ix_id_cas_pais", columns={"id_cas_pais"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\AyudaRepository")
 */
class Ayuda
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ayuda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAyuda;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text", length=65535, nullable=false)
     */
    private $contenido;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_en", type="string", length=100, nullable=false)
     */
    private $tituloEn;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_en", type="text", length=65535, nullable=false)
     */
    private $contenidoEn;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_de", type="string", length=100, nullable=false)
     */
    private $tituloDe;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_de", type="text", length=65535, nullable=false)
     */
    private $contenidoDe;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_fr", type="string", length=100, nullable=false)
     */
    private $tituloFr;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_fr", type="text", length=65535, nullable=false)
     */
    private $contenidoFr;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_it", type="string", length=100, nullable=false)
     */
    private $tituloIt;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_it", type="text", length=65535, nullable=false)
     */
    private $contenidoIt;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_pt", type="string", length=100, nullable=false)
     */
    private $tituloPt;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_pt", type="text", length=65535, nullable=false)
     */
    private $contenidoPt;

    /**
     * @var bool
     *
     * @ORM\Column(name="id_cas_pais", type="boolean", nullable=false)
     */
    private $idCasPais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=256, nullable=true)
     */
    private $imagen;

    /**
     * @var bool
     *
     * @ORM\Column(name="actayuda", type="boolean", nullable=false)
     */
    private $actayuda;

    public function getIdAyuda(): ?int
    {
        return $this->idAyuda;
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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

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

    public function getTituloEn(): ?string
    {
        return $this->tituloEn;
    }

    public function setTituloEn(string $tituloEn): self
    {
        $this->tituloEn = $tituloEn;

        return $this;
    }

    public function getContenidoEn(): ?string
    {
        return $this->contenidoEn;
    }

    public function setContenidoEn(string $contenidoEn): self
    {
        $this->contenidoEn = $contenidoEn;

        return $this;
    }

    public function getTituloDe(): ?string
    {
        return $this->tituloDe;
    }

    public function setTituloDe(string $tituloDe): self
    {
        $this->tituloDe = $tituloDe;

        return $this;
    }

    public function getContenidoDe(): ?string
    {
        return $this->contenidoDe;
    }

    public function setContenidoDe(string $contenidoDe): self
    {
        $this->contenidoDe = $contenidoDe;

        return $this;
    }

    public function getTituloFr(): ?string
    {
        return $this->tituloFr;
    }

    public function setTituloFr(string $tituloFr): self
    {
        $this->tituloFr = $tituloFr;

        return $this;
    }

    public function getContenidoFr(): ?string
    {
        return $this->contenidoFr;
    }

    public function setContenidoFr(string $contenidoFr): self
    {
        $this->contenidoFr = $contenidoFr;

        return $this;
    }

    public function getTituloIt(): ?string
    {
        return $this->tituloIt;
    }

    public function setTituloIt(string $tituloIt): self
    {
        $this->tituloIt = $tituloIt;

        return $this;
    }

    public function getContenidoIt(): ?string
    {
        return $this->contenidoIt;
    }

    public function setContenidoIt(string $contenidoIt): self
    {
        $this->contenidoIt = $contenidoIt;

        return $this;
    }

    public function getTituloPt(): ?string
    {
        return $this->tituloPt;
    }

    public function setTituloPt(string $tituloPt): self
    {
        $this->tituloPt = $tituloPt;

        return $this;
    }

    public function getContenidoPt(): ?string
    {
        return $this->contenidoPt;
    }

    public function setContenidoPt(string $contenidoPt): self
    {
        $this->contenidoPt = $contenidoPt;

        return $this;
    }

    public function getIdCasPais(): ?bool
    {
        return $this->idCasPais;
    }

    public function setIdCasPais(bool $idCasPais): self
    {
        $this->idCasPais = $idCasPais;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getActayuda(): ?bool
    {
        return $this->actayuda;
    }

    public function setActayuda(bool $actayuda): self
    {
        $this->actayuda = $actayuda;

        return $this;
    }


}
