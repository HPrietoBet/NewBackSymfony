<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasOld
 *
 * @ORM\Table(name="casas_old", indexes={@ORM\Index(name="id_categoria", columns={"id_categoria"})})
  * @ORM\Entity(repositoryClass="App\Repository\Ggms\CasasOldRepository")
 */
class CasasOld
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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="id_paises", type="text", length=0, nullable=false)
     */
    private $idPaises;

    /**
     * @var int
     *
     * @ORM\Column(name="responsable", type="integer", nullable=false)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="bono", type="string", length=255, nullable=false)
     */
    private $bono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usuario", type="string", length=255, nullable=true)
     */
    private $usuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="metodo_cobro", type="string", length=255, nullable=true)
     */
    private $metodoCobro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="procedimiento_pago", type="string", length=255, nullable=true)
     */
    private $procedimientoPago;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contacto", type="string", length=255, nullable=true)
     */
    private $contacto;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo_feed_cuotas", type="boolean", nullable=false)
     */
    private $activoFeedCuotas = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="feed_cuotas", type="string", length=255, nullable=true)
     */
    private $feedCuotas;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo_feed_streaming", type="boolean", nullable=false)
     */
    private $activoFeedStreaming = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="feed_streaming", type="string", length=255, nullable=true)
     */
    private $feedStreaming;

    /**
     * @var string|null
     *
     * @ORM\Column(name="baseline", type="string", length=255, nullable=true)
     */
    private $baseline;

    /**
     * @var bool
     *
     * @ORM\Column(name="requiere_factura", type="boolean", nullable=false)
     */
    private $requiereFactura = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    /**
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categoria", referencedColumnName="id")
     * })
     */
    private $idCategoria;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getIdPaises(): ?string
    {
        return $this->idPaises;
    }

    public function setIdPaises(string $idPaises): self
    {
        $this->idPaises = $idPaises;

        return $this;
    }

    public function getResponsable(): ?int
    {
        return $this->responsable;
    }

    public function setResponsable(int $responsable): self
    {
        $this->responsable = $responsable;

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

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getMetodoCobro(): ?string
    {
        return $this->metodoCobro;
    }

    public function setMetodoCobro(?string $metodoCobro): self
    {
        $this->metodoCobro = $metodoCobro;

        return $this;
    }

    public function getProcedimientoPago(): ?string
    {
        return $this->procedimientoPago;
    }

    public function setProcedimientoPago(?string $procedimientoPago): self
    {
        $this->procedimientoPago = $procedimientoPago;

        return $this;
    }

    public function getContacto(): ?string
    {
        return $this->contacto;
    }

    public function setContacto(?string $contacto): self
    {
        $this->contacto = $contacto;

        return $this;
    }

    public function getActivoFeedCuotas(): ?bool
    {
        return $this->activoFeedCuotas;
    }

    public function setActivoFeedCuotas(bool $activoFeedCuotas): self
    {
        $this->activoFeedCuotas = $activoFeedCuotas;

        return $this;
    }

    public function getFeedCuotas(): ?string
    {
        return $this->feedCuotas;
    }

    public function setFeedCuotas(?string $feedCuotas): self
    {
        $this->feedCuotas = $feedCuotas;

        return $this;
    }

    public function getActivoFeedStreaming(): ?bool
    {
        return $this->activoFeedStreaming;
    }

    public function setActivoFeedStreaming(bool $activoFeedStreaming): self
    {
        $this->activoFeedStreaming = $activoFeedStreaming;

        return $this;
    }

    public function getFeedStreaming(): ?string
    {
        return $this->feedStreaming;
    }

    public function setFeedStreaming(?string $feedStreaming): self
    {
        $this->feedStreaming = $feedStreaming;

        return $this;
    }

    public function getBaseline(): ?string
    {
        return $this->baseline;
    }

    public function setBaseline(?string $baseline): self
    {
        $this->baseline = $baseline;

        return $this;
    }

    public function getRequiereFactura(): ?bool
    {
        return $this->requiereFactura;
    }

    public function setRequiereFactura(bool $requiereFactura): self
    {
        $this->requiereFactura = $requiereFactura;

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

    public function getIdCategoria(): ?Categorias
    {
        return $this->idCategoria;
    }

    public function setIdCategoria(?Categorias $idCategoria): self
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }


}
