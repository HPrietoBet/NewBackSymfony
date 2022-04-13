<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAfiliadosPagosPremium
 *
 * @ORM\Table(name="usuarios_afiliados_pagos_premium")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosAfiliadosPagosPremiumRepository")
 */
class UsuariosAfiliadosPagosPremium
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_prem_pago", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPremPago;

    /**
     * @var int
     *
     * @ORM\Column(name="idtipster", type="integer", nullable=false)
     */
    private $idtipster;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepayment", type="datetime", nullable=false)
     */
    private $datepayment;

    /**
     * @var string
     *
     * @ORM\Column(name="product", type="string", length=1000, nullable=false)
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="payment", type="string", length=45, nullable=false)
     */
    private $payment;

    /**
     * @var float
     *
     * @ORM\Column(name="quantity", type="float", precision=10, scale=2, nullable=false)
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="comision", type="float", precision=9, scale=2, nullable=false)
     */
    private $comision;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_pago", type="float", precision=9, scale=2, nullable=false)
     */
    private $importePago;

    /**
     * @var bool
     *
     * @ORM\Column(name="estado_pago", type="boolean", nullable=false)
     */
    private $estadoPago;

    public function getIdPremPago(): ?int
    {
        return $this->idPremPago;
    }

    public function getIdtipster(): ?int
    {
        return $this->idtipster;
    }

    public function setIdtipster(int $idtipster): self
    {
        $this->idtipster = $idtipster;

        return $this;
    }

    public function getDatepayment(): ?\DateTimeInterface
    {
        return $this->datepayment;
    }

    public function setDatepayment(\DateTimeInterface $datepayment): self
    {
        $this->datepayment = $datepayment;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(string $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getComision(): ?float
    {
        return $this->comision;
    }

    public function setComision(float $comision): self
    {
        $this->comision = $comision;

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

    public function getEstadoPago(): ?bool
    {
        return $this->estadoPago;
    }

    public function setEstadoPago(bool $estadoPago): self
    {
        $this->estadoPago = $estadoPago;

        return $this;
    }


}
