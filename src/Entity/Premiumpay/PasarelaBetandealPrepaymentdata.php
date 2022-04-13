<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * PasarelaBetandealPrepaymentdata
 *
 * @ORM\Table(name="pasarela_betandeal_prepaymentdata", indexes={@ORM\Index(name="fk_pasarela_betandeal_prepaymentdata_user_premiumpay1_idx", columns={"user_premiumpay_iduser_premiumpay"}), @ORM\Index(name="ix_email", columns={"email"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\PasarelasBetanDealPrePaymentdataRepository")
 */
class PasarelaBetandealPrepaymentdata
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtransaccion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtransaccion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="idtipster", type="string", length=100, nullable=true)
     */
    private $idtipster;

    /**
     * @var int
     *
     * @ORM\Column(name="idpasarela", type="integer", nullable=false)
     */
    private $idpasarela;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idproducto", type="integer", nullable=true)
     */
    private $idproducto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idusuario", type="integer", nullable=true)
     */
    private $idusuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone", type="string", length=45, nullable=true)
     */
    private $telephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment", type="string", length=45, nullable=true)
     */
    private $payment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product", type="string", length=1000, nullable=true)
     */
    private $product;

    /**
     * @var string|null
     *
     * @ORM\Column(name="quantity", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=10, nullable=false, options={"default"="€"})
     */
    private $currency = '€';

    /**
     * @var string|null
     *
     * @ORM\Column(name="paypal", type="string", length=250, nullable=true)
     */
    private $paypal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="card", type="string", length=45, nullable=true)
     */
    private $card;

    /**
     * @var string|null
     *
     * @ORM\Column(name="device", type="string", length=45, nullable=true)
     */
    private $device;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ippayment", type="string", length=100, nullable=true)
     */
    private $ippayment;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datepayment", type="datetime", nullable=true)
     */
    private $datepayment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=100, nullable=true)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="paypalid", type="string", length=100, nullable=true)
     */
    private $paypalid;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="selldone", type="boolean", nullable=true)
     */
    private $selldone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="estadopayu", type="string", length=255, nullable=true)
     */
    private $estadopayu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="iddescuento_producto", type="integer", nullable=true)
     */
    private $iddescuentoProducto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="porcentaje_descuento", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $porcentajeDescuento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="saldo_utilizado", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $saldoUtilizado = '0.00';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="descuento_caducado", type="boolean", nullable=true)
     */
    private $descuentoCaducado = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="descuento_verificado", type="boolean", nullable=true)
     */
    private $descuentoVerificado = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="token_tarjeta", type="string", length=128, nullable=true)
     */
    private $tokenTarjeta;

    /**
     * @var \UserPremiumpay
     *
     * @ORM\ManyToOne(targetEntity="UserPremiumpay")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_premiumpay_iduser_premiumpay", referencedColumnName="iduser_premiumpay")
     * })
     */
    private $userPremiumpayIduserPremiumpay;

    public function getIdtransaccion(): ?int
    {
        return $this->idtransaccion;
    }

    public function getIdtipster(): ?string
    {
        return $this->idtipster;
    }

    public function setIdtipster(?string $idtipster): self
    {
        $this->idtipster = $idtipster;

        return $this;
    }

    public function getIdpasarela(): ?int
    {
        return $this->idpasarela;
    }

    public function setIdpasarela(int $idpasarela): self
    {
        $this->idpasarela = $idpasarela;

        return $this;
    }

    public function getIdproducto(): ?int
    {
        return $this->idproducto;
    }

    public function setIdproducto(?int $idproducto): self
    {
        $this->idproducto = $idproducto;

        return $this;
    }

    public function getIdusuario(): ?int
    {
        return $this->idusuario;
    }

    public function setIdusuario(?int $idusuario): self
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(?string $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(?string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getPaypal(): ?string
    {
        return $this->paypal;
    }

    public function setPaypal(?string $paypal): self
    {
        $this->paypal = $paypal;

        return $this;
    }

    public function getCard(): ?string
    {
        return $this->card;
    }

    public function setCard(?string $card): self
    {
        $this->card = $card;

        return $this;
    }

    public function getDevice(): ?string
    {
        return $this->device;
    }

    public function setDevice(?string $device): self
    {
        $this->device = $device;

        return $this;
    }

    public function getIppayment(): ?string
    {
        return $this->ippayment;
    }

    public function setIppayment(?string $ippayment): self
    {
        $this->ippayment = $ippayment;

        return $this;
    }

    public function getDatepayment(): ?\DateTimeInterface
    {
        return $this->datepayment;
    }

    public function setDatepayment(?\DateTimeInterface $datepayment): self
    {
        $this->datepayment = $datepayment;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPaypalid(): ?string
    {
        return $this->paypalid;
    }

    public function setPaypalid(?string $paypalid): self
    {
        $this->paypalid = $paypalid;

        return $this;
    }

    public function getSelldone(): ?bool
    {
        return $this->selldone;
    }

    public function setSelldone(?bool $selldone): self
    {
        $this->selldone = $selldone;

        return $this;
    }

    public function getEstadopayu(): ?string
    {
        return $this->estadopayu;
    }

    public function setEstadopayu(?string $estadopayu): self
    {
        $this->estadopayu = $estadopayu;

        return $this;
    }

    public function getIddescuentoProducto(): ?int
    {
        return $this->iddescuentoProducto;
    }

    public function setIddescuentoProducto(?int $iddescuentoProducto): self
    {
        $this->iddescuentoProducto = $iddescuentoProducto;

        return $this;
    }

    public function getPorcentajeDescuento(): ?string
    {
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento(?string $porcentajeDescuento): self
    {
        $this->porcentajeDescuento = $porcentajeDescuento;

        return $this;
    }

    public function getSaldoUtilizado(): ?string
    {
        return $this->saldoUtilizado;
    }

    public function setSaldoUtilizado(?string $saldoUtilizado): self
    {
        $this->saldoUtilizado = $saldoUtilizado;

        return $this;
    }

    public function getDescuentoCaducado(): ?bool
    {
        return $this->descuentoCaducado;
    }

    public function setDescuentoCaducado(?bool $descuentoCaducado): self
    {
        $this->descuentoCaducado = $descuentoCaducado;

        return $this;
    }

    public function getDescuentoVerificado(): ?bool
    {
        return $this->descuentoVerificado;
    }

    public function setDescuentoVerificado(?bool $descuentoVerificado): self
    {
        $this->descuentoVerificado = $descuentoVerificado;

        return $this;
    }

    public function getTokenTarjeta(): ?string
    {
        return $this->tokenTarjeta;
    }

    public function setTokenTarjeta(?string $tokenTarjeta): self
    {
        $this->tokenTarjeta = $tokenTarjeta;

        return $this;
    }

    public function getUserPremiumpayIduserPremiumpay(): ?UserPremiumpay
    {
        return $this->userPremiumpayIduserPremiumpay;
    }

    public function setUserPremiumpayIduserPremiumpay(?UserPremiumpay $userPremiumpayIduserPremiumpay): self
    {
        $this->userPremiumpayIduserPremiumpay = $userPremiumpayIduserPremiumpay;

        return $this;
    }


}
