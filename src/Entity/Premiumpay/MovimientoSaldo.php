<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovimientoSaldo
 *
 * @ORM\Table(name="movimiento_saldo", indexes={@ORM\Index(name="fk_movimiento_saldo_pasarela_betandeal_prepaymentdata1_idx", columns={"prepayment_idtransaccion"}), @ORM\Index(name="fk_movimiento_saldo_user_premiumpay1_idx", columns={"iduser_premiumpay"}), @ORM\Index(name="fk_movimiento_saldo_pasarela_betandeal_paymentdata1_idx", columns={"payment_idtransaccion"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\MovimientosSaldoRepository")
 */
class MovimientoSaldo
{
    /**
     * @var int
     *
     * @ORM\Column(name="idmovimiento_saldo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmovimientoSaldo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="importe", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $importe;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="devolucion", type="boolean", nullable=true, options={"default"="1"})
     */
    private $devolucion = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="liberado", type="boolean", nullable=true)
     */
    private $liberado = '0';

    /**
     * @var \PasarelaBetandealPrepaymentdata
     *
     * @ORM\ManyToOne(targetEntity="PasarelaBetandealPrepaymentdata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prepayment_idtransaccion", referencedColumnName="idtransaccion")
     * })
     */
    private $prepaymentIdtransaccion;

    /**
     * @var \PasarelaBetandealPaymentdata
     *
     * @ORM\ManyToOne(targetEntity="PasarelaBetandealPaymentdata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="payment_idtransaccion", referencedColumnName="idtransaccion")
     * })
     */
    private $paymentIdtransaccion;

    /**
     * @var \UserPremiumpay
     *
     * @ORM\ManyToOne(targetEntity="UserPremiumpay")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser_premiumpay", referencedColumnName="iduser_premiumpay")
     * })
     */
    private $iduserPremiumpay;

    public function getIdmovimientoSaldo(): ?int
    {
        return $this->idmovimientoSaldo;
    }

    public function getImporte(): ?string
    {
        return $this->importe;
    }

    public function setImporte(?string $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

    public function getDevolucion(): ?bool
    {
        return $this->devolucion;
    }

    public function setDevolucion(?bool $devolucion): self
    {
        $this->devolucion = $devolucion;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getLiberado(): ?bool
    {
        return $this->liberado;
    }

    public function setLiberado(?bool $liberado): self
    {
        $this->liberado = $liberado;

        return $this;
    }

    public function getPrepaymentIdtransaccion(): ?PasarelaBetandealPrepaymentdata
    {
        return $this->prepaymentIdtransaccion;
    }

    public function setPrepaymentIdtransaccion(?PasarelaBetandealPrepaymentdata $prepaymentIdtransaccion): self
    {
        $this->prepaymentIdtransaccion = $prepaymentIdtransaccion;

        return $this;
    }

    public function getPaymentIdtransaccion(): ?PasarelaBetandealPaymentdata
    {
        return $this->paymentIdtransaccion;
    }

    public function setPaymentIdtransaccion(?PasarelaBetandealPaymentdata $paymentIdtransaccion): self
    {
        $this->paymentIdtransaccion = $paymentIdtransaccion;

        return $this;
    }

    public function getIduserPremiumpay(): ?UserPremiumpay
    {
        return $this->iduserPremiumpay;
    }

    public function setIduserPremiumpay(?UserPremiumpay $iduserPremiumpay): self
    {
        $this->iduserPremiumpay = $iduserPremiumpay;

        return $this;
    }


}
