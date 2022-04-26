<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * PasarelaBetandealPaymentdata
 *
 * @ORM\Table(name="pasarela_betandeal_paymentdata", uniqueConstraints={@ORM\UniqueConstraint(name="idpago", columns={"idpago"})}, indexes={@ORM\Index(name="ix_idtipster", columns={"idtipster"}), @ORM\Index(name="ix_datepayment", columns={"datepayment"}), @ORM\Index(name="ix_country", columns={"country"}), @ORM\Index(name="ix_idusuario", columns={"idusuario"}), @ORM\Index(name="fk_pasarela_betandeal_paymentdata_user_premiumpay1_idx", columns={"user_premiumpay_iduser_premiumpay"}), @ORM\Index(name="ix_email", columns={"email"}), @ORM\Index(name="ix_idpasarela", columns={"idpasarela"}), @ORM\Index(name="ix_idproducto", columns={"idproducto"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\PasarelasBetanDealPaymentdataRepository")
 */
class PasarelaBetandealPaymentdata
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
     * @var string
     *
     * @ORM\Column(name="idtipster", type="string", length=100, nullable=false)
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
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false, options={"default"="1"})
     */
    private $visible = true;

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
     * @ORM\Column(name="product", type="string", length=1500, nullable=true)
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
     * @var float|null
     *
     * @ORM\Column(name="comision", type="float", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $comision = 0.00;

    /**
     * @var float|null
     *
     * @ORM\Column(name="importe_pago", type="float", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $importePago = 0.00;

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
     * @var string
     *
     * @ORM\Column(name="ippayment", type="string", length=100, nullable=false)
     */
    private $ippayment;

    /**
     * @var string
     *
     * @ORM\Column(name="datepayment", type="string", nullable=false)
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
     * @var string|null
     *
     * @ORM\Column(name="idpago", type="string", length=255, nullable=true)
     */
    private $idpago;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factura_numero", type="string", length=45, nullable=true)
     */
    private $facturaNumero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factura_referencia", type="string", length=45, nullable=true)
     */
    private $facturaReferencia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factura_lote", type="string", length=45, nullable=true)
     */
    private $facturaLote;

    /**
     * @var int|null
     *
     * @ORM\Column(name="factura_indice", type="integer", nullable=true)
     */
    private $facturaIndice;

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
     * @ORM\Column(name="factura_porcentaje_iva", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $facturaPorcentajeIva;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factura_fecha", type="string", length=45, nullable=true)
     */
    private $facturaFecha;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factura_filepath", type="string", length=255, nullable=true)
     */
    private $facturaFilepath;

    /**
     * @var string|null
     *
     * @ORM\Column(name="factura_filename", type="string", length=255, nullable=true)
     */
    private $facturaFilename;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="factura_filecreated", type="boolean", nullable=true)
     */
    private $facturaFilecreated = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="saldo_utilizado", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $saldoUtilizado = '0.00';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="devuelto", type="boolean", nullable=true)
     */
    private $devuelto = '0';

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

    public function setIdtipster(string $idtipster): self
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

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

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

    public function getComision(): ?float
    {
        return $this->comision;
    }

    public function setComision(?float $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    public function getImportePago(): ?float
    {
        return $this->importePago;
    }

    public function setImportePago(?float $importePago): self
    {
        $this->importePago = $importePago;

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

    public function setIppayment(string $ippayment): self
    {
        $this->ippayment = $ippayment;

        return $this;
    }

    public function getDatepayment(): ?string
    {
        return $this->datepayment;
    }

    public function setDatepayment(string $datepayment): self
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

    public function getIdpago(): ?string
    {
        return $this->idpago;
    }

    public function setIdpago(?string $idpago): self
    {
        $this->idpago = $idpago;

        return $this;
    }

    public function getFacturaNumero(): ?string
    {
        return $this->facturaNumero;
    }

    public function setFacturaNumero(?string $facturaNumero): self
    {
        $this->facturaNumero = $facturaNumero;

        return $this;
    }

    public function getFacturaReferencia(): ?string
    {
        return $this->facturaReferencia;
    }

    public function setFacturaReferencia(?string $facturaReferencia): self
    {
        $this->facturaReferencia = $facturaReferencia;

        return $this;
    }

    public function getFacturaLote(): ?string
    {
        return $this->facturaLote;
    }

    public function setFacturaLote(?string $facturaLote): self
    {
        $this->facturaLote = $facturaLote;

        return $this;
    }

    public function getFacturaIndice(): ?int
    {
        return $this->facturaIndice;
    }

    public function setFacturaIndice(?int $facturaIndice): self
    {
        $this->facturaIndice = $facturaIndice;

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

    public function getFacturaPorcentajeIva(): ?string
    {
        return $this->facturaPorcentajeIva;
    }

    public function setFacturaPorcentajeIva(?string $facturaPorcentajeIva): self
    {
        $this->facturaPorcentajeIva = $facturaPorcentajeIva;

        return $this;
    }

    public function getFacturaFecha(): ?string
    {
        return $this->facturaFecha;
    }

    public function setFacturaFecha(?string $facturaFecha): self
    {
        $this->facturaFecha = $facturaFecha;

        return $this;
    }

    public function getFacturaFilepath(): ?string
    {
        return $this->facturaFilepath;
    }

    public function setFacturaFilepath(?string $facturaFilepath): self
    {
        $this->facturaFilepath = $facturaFilepath;

        return $this;
    }

    public function getFacturaFilename(): ?string
    {
        return $this->facturaFilename;
    }

    public function setFacturaFilename(?string $facturaFilename): self
    {
        $this->facturaFilename = $facturaFilename;

        return $this;
    }

    public function getFacturaFilecreated(): ?bool
    {
        return $this->facturaFilecreated;
    }

    public function setFacturaFilecreated(?bool $facturaFilecreated): self
    {
        $this->facturaFilecreated = $facturaFilecreated;

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

    public function getDevuelto(): ?bool
    {
        return $this->devuelto;
    }

    public function setDevuelto(?bool $devuelto): self
    {
        $this->devuelto = $devuelto;

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
