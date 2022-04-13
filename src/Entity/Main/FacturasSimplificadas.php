<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacturasSimplificadas
 *
 * @ORM\Table(name="facturas_simplificadas", indexes={@ORM\Index(name="ix_id_pasarela", columns={"id_pasarela"}), @ORM\Index(name="ix_id_factura", columns={"id_factura"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\FacturasSimplificadasRepository")
 */
class FacturasSimplificadas
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
     * @ORM\Column(name="id_factura", type="integer", nullable=false)
     */
    private $idFactura;

    /**
     * @var int
     *
     * @ORM\Column(name="id_pasarela", type="integer", nullable=false)
     */
    private $idPasarela;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=255, nullable=false)
     */
    private $referencia;

    /**
     * @var string
     *
     * @ORM\Column(name="email_comprador", type="string", length=255, nullable=false)
     */
    private $emailComprador;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip_comprador", type="string", length=255, nullable=true)
     */
    private $ipComprador;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=false)
     */
    private $tipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_pago", type="date", nullable=false)
     */
    private $fechaPago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_factura_nombre", type="date", nullable=false)
     */
    private $fechaFacturaNombre;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_pago", type="float", precision=10, scale=2, nullable=false)
     */
    private $importePago;

    /**
     * @var string|null
     *
     * @ORM\Column(name="archivo_factura", type="string", length=255, nullable=true)
     */
    private $archivoFactura;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFactura(): ?int
    {
        return $this->idFactura;
    }

    public function setIdFactura(int $idFactura): self
    {
        $this->idFactura = $idFactura;

        return $this;
    }

    public function getIdPasarela(): ?int
    {
        return $this->idPasarela;
    }

    public function setIdPasarela(int $idPasarela): self
    {
        $this->idPasarela = $idPasarela;

        return $this;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): self
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getEmailComprador(): ?string
    {
        return $this->emailComprador;
    }

    public function setEmailComprador(string $emailComprador): self
    {
        $this->emailComprador = $emailComprador;

        return $this;
    }

    public function getIpComprador(): ?string
    {
        return $this->ipComprador;
    }

    public function setIpComprador(?string $ipComprador): self
    {
        $this->ipComprador = $ipComprador;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getFechaPago(): ?\DateTimeInterface
    {
        return $this->fechaPago;
    }

    public function setFechaPago(\DateTimeInterface $fechaPago): self
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    public function getFechaFacturaNombre(): ?\DateTimeInterface
    {
        return $this->fechaFacturaNombre;
    }

    public function setFechaFacturaNombre(\DateTimeInterface $fechaFacturaNombre): self
    {
        $this->fechaFacturaNombre = $fechaFacturaNombre;

        return $this;
    }

    public function getImportePago(): ?float
    {
        return $this->importePago;
    }

    public function setImportePago(float $importePago): self
    {
        $this->importePago = $importePago;

        return $this;
    }

    public function getArchivoFactura(): ?string
    {
        return $this->archivoFactura;
    }

    public function setArchivoFactura(?string $archivoFactura): self
    {
        $this->archivoFactura = $archivoFactura;

        return $this;
    }


}
