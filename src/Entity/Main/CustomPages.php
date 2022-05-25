<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomPages
 *
 * @ORM\Table(name="custom_pages", indexes={@ORM\Index(name="id_usuario", columns={"id_usuario"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CustomPagesRepository")
s */
class CustomPages
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
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     */
    private $imagen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen_fondo", type="string", length=255, nullable=true)
     */
    private $imagenFondo;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="es_geolocalizada", type="boolean", nullable=true)
     */
    private $esGeolocalizada = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pais", type="text", length=0, nullable=true, options={"comment"="Pais si el campo es_geolocalizada esta a 1"})
     */
    private $pais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="casas", type="text", length=0, nullable=true)
     */
    private $casas;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha", type="string", nullable=false)
     */
    private $fecha;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="mostrar_stats", type="boolean", nullable=true)
     */
    private $mostrarStats;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_stats", type="text", length=0, nullable=true)
     */
    private $urlStats;

    /**
     * @var bool
     *
     * @ORM\Column(name="mostrar_pasarela", type="boolean", nullable=false)
     */
    private $mostrarPasarela = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_pasarela", type="integer", nullable=true)
     */
    private $idPasarela;

    /**
     * @var bool
     *
     * @ORM\Column(name="primero_ppay", type="boolean", nullable=false)
     */
    private $primeroPpay = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="primero_cuotas", type="boolean", nullable=false)
     */
    private $primeroCuotas = '0';

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

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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

    public function getImagenFondo(): ?string
    {
        return $this->imagenFondo;
    }

    public function setImagenFondo(?string $imagenFondo): self
    {
        $this->imagenFondo = $imagenFondo;

        return $this;
    }

    public function getEsGeolocalizada(): ?bool
    {
        return $this->esGeolocalizada;
    }

    public function setEsGeolocalizada(?bool $esGeolocalizada): self
    {
        $this->esGeolocalizada = $esGeolocalizada;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(?string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getCasas(): ?string
    {
        return $this->casas;
    }

    public function setCasas(?string $casas): self
    {
        $this->casas = $casas;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getMostrarStats(): ?bool
    {
        return $this->mostrarStats;
    }

    public function setMostrarStats(?bool $mostrarStats): self
    {
        $this->mostrarStats = $mostrarStats;

        return $this;
    }

    public function getUrlStats(): ?string
    {
        return $this->urlStats;
    }

    public function setUrlStats(?string $urlStats): self
    {
        $this->urlStats = $urlStats;

        return $this;
    }

    public function getMostrarPasarela(): ?bool
    {
        return $this->mostrarPasarela;
    }

    public function setMostrarPasarela(bool $mostrarPasarela): self
    {
        $this->mostrarPasarela = $mostrarPasarela;

        return $this;
    }

    public function getIdPasarela(): ?int
    {
        return $this->idPasarela;
    }

    public function setIdPasarela(?int $idPasarela): self
    {
        $this->idPasarela = $idPasarela;

        return $this;
    }

    public function getPrimeroPpay(): ?bool
    {
        return $this->primeroPpay;
    }

    public function setPrimeroPpay(bool $primeroPpay): self
    {
        $this->primeroPpay = $primeroPpay;

        return $this;
    }

    public function getPrimeroCuotas(): ?bool
    {
        return $this->primeroCuotas;
    }

    public function setPrimeroCuotas(bool $primeroCuotas): self
    {
        $this->primeroCuotas = $primeroCuotas;

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
