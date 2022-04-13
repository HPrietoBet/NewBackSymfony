<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facturacion
 *
 * @ORM\Table(name="facturacion", indexes={@ORM\Index(name="ix_id_usu_fac", columns={"id_usu_fac"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\FacturacionRepository")
 */
class Facturacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_fac", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFac;

    /**
     * @var int
     *
     * @ORM\Column(name="id_usu_fac", type="integer", nullable=false)
     */
    private $idUsuFac;

    /**
     * @var string
     *
     * @ORM\Column(name="anio_fac", type="string", length=4, nullable=false)
     */
    private $anioFac;

    /**
     * @var string
     *
     * @ORM\Column(name="mes_fac", type="string", length=4, nullable=false)
     */
    private $mesFac;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fac", type="date", nullable=false)
     */
    private $fechaFac;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_factura", type="integer", nullable=false)
     */
    private $numeroFactura;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_factura_internacional", type="integer", nullable=true)
     */
    private $numeroFacturaInternacional;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_fac", type="string", length=256, nullable=false)
     */
    private $tituloFac;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo_fac", type="string", length=256, nullable=false)
     */
    private $archivoFac;

    /**
     * @var bool
     *
     * @ORM\Column(name="id_fac_opc", type="boolean", nullable=false)
     */
    private $idFacOpc;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=9, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $importe = 0.00;

    /**
     * @var int|null
     *
     * @ORM\Column(name="metodo_pago", type="integer", nullable=true)
     */
    private $metodoPago;

    /**
     * @var bool
     *
     * @ORM\Column(name="pagado", type="boolean", nullable=false)
     */
    private $pagado;

    /**
     * @var int
     *
     * @ORM\Column(name="impuesto", type="integer", nullable=false)
     */
    private $impuesto;

    public function getIdFac(): ?int
    {
        return $this->idFac;
    }

    public function getIdUsuFac(): ?int
    {
        return $this->idUsuFac;
    }

    public function setIdUsuFac(int $idUsuFac): self
    {
        $this->idUsuFac = $idUsuFac;

        return $this;
    }

    public function getAnioFac(): ?string
    {
        return $this->anioFac;
    }

    public function setAnioFac(string $anioFac): self
    {
        $this->anioFac = $anioFac;

        return $this;
    }

    public function getMesFac(): ?string
    {
        return $this->mesFac;
    }

    public function setMesFac(string $mesFac): self
    {
        $this->mesFac = $mesFac;

        return $this;
    }

    public function getFechaFac(): ?\DateTimeInterface
    {
        return $this->fechaFac;
    }

    public function setFechaFac(\DateTimeInterface $fechaFac): self
    {
        $this->fechaFac = $fechaFac;

        return $this;
    }

    public function getNumeroFactura(): ?int
    {
        return $this->numeroFactura;
    }

    public function setNumeroFactura(int $numeroFactura): self
    {
        $this->numeroFactura = $numeroFactura;

        return $this;
    }

    public function getNumeroFacturaInternacional(): ?int
    {
        return $this->numeroFacturaInternacional;
    }

    public function setNumeroFacturaInternacional(?int $numeroFacturaInternacional): self
    {
        $this->numeroFacturaInternacional = $numeroFacturaInternacional;

        return $this;
    }

    public function getTituloFac(): ?string
    {
        return $this->tituloFac;
    }

    public function setTituloFac(string $tituloFac): self
    {
        $this->tituloFac = $tituloFac;

        return $this;
    }

    public function getArchivoFac(): ?string
    {
        return $this->archivoFac;
    }

    public function setArchivoFac(string $archivoFac): self
    {
        $this->archivoFac = $archivoFac;

        return $this;
    }

    public function getIdFacOpc(): ?bool
    {
        return $this->idFacOpc;
    }

    public function setIdFacOpc(bool $idFacOpc): self
    {
        $this->idFacOpc = $idFacOpc;

        return $this;
    }

    public function getImporte(): ?float
    {
        return $this->importe;
    }

    public function setImporte(float $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

    public function getMetodoPago(): ?int
    {
        return $this->metodoPago;
    }

    public function setMetodoPago(?int $metodoPago): self
    {
        $this->metodoPago = $metodoPago;

        return $this;
    }

    public function getPagado(): ?bool
    {
        return $this->pagado;
    }

    public function setPagado(bool $pagado): self
    {
        $this->pagado = $pagado;

        return $this;
    }

    public function getImpuesto(): ?int
    {
        return $this->impuesto;
    }

    public function setImpuesto(int $impuesto): self
    {
        $this->impuesto = $impuesto;

        return $this;
    }


}
