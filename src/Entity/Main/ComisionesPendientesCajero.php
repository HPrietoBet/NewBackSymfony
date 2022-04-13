<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComisionesPendientesCajero
 *
 * @ORM\Table(name="comisiones_pendientes_cajero", indexes={@ORM\Index(name="ix_id_usuario", columns={"id_usuario"}), @ORM\Index(name="ix_concepto", columns={"concepto"}), @ORM\Index(name="IDX_BE2FC85CAD4A165A", columns={"facturacion_datos_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\ComisionesPendientesCajeroRepository")
 */
class ComisionesPendientesCajero
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=2, nullable=false)
     */
    private $importe;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=255, nullable=false)
     */
    private $concepto;

    /**
     * @var int
     *
     * @ORM\Column(name="tipo_movimiento", type="smallint", nullable=false)
     */
    private $tipoMovimiento;

    /**
     * @var int|null
     *
     * @ORM\Column(name="facturacion_datos_id", type="integer", nullable=true)
     */
    private $facturacionDatosId;

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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

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

    public function getConcepto(): ?string
    {
        return $this->concepto;
    }

    public function setConcepto(string $concepto): self
    {
        $this->concepto = $concepto;

        return $this;
    }

    public function getTipoMovimiento(): ?int
    {
        return $this->tipoMovimiento;
    }

    public function setTipoMovimiento(int $tipoMovimiento): self
    {
        $this->tipoMovimiento = $tipoMovimiento;

        return $this;
    }

    public function getFacturacionDatosId(): ?int
    {
        return $this->facturacionDatosId;
    }

    public function setFacturacionDatosId(?int $facturacionDatosId): self
    {
        $this->facturacionDatosId = $facturacionDatosId;

        return $this;
    }


}
