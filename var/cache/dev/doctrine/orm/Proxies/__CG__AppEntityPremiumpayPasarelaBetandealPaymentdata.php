<?php

namespace Proxies\__CG__\App\Entity\Premiumpay;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PasarelaBetandealPaymentdata extends \App\Entity\Premiumpay\PasarelaBetandealPaymentdata implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idtransaccion', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idtipster', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idpasarela', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idproducto', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idusuario', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'visible', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'email', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'telephone', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'payment', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'product', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'quantity', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'currency', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'comision', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'importePago', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'paypal', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'card', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'device', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'ippayment', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'datepayment', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'country', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'paypalid', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idpago', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaNumero', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaReferencia', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaLote', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaIndice', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'iddescuentoProducto', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'porcentajeDescuento', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaPorcentajeIva', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaFecha', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaFilepath', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaFilename', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaFilecreated', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'saldoUtilizado', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'devuelto', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'tokenTarjeta', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'userPremiumpayIduserPremiumpay'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idtransaccion', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idtipster', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idpasarela', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idproducto', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idusuario', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'visible', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'email', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'telephone', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'payment', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'product', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'quantity', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'currency', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'comision', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'importePago', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'paypal', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'card', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'device', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'ippayment', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'datepayment', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'country', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'paypalid', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'idpago', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaNumero', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaReferencia', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaLote', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaIndice', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'iddescuentoProducto', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'porcentajeDescuento', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaPorcentajeIva', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaFecha', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaFilepath', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaFilename', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'facturaFilecreated', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'saldoUtilizado', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'devuelto', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'tokenTarjeta', '' . "\0" . 'App\\Entity\\Premiumpay\\PasarelaBetandealPaymentdata' . "\0" . 'userPremiumpayIduserPremiumpay'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PasarelaBetandealPaymentdata $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getIdtransaccion(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdtransaccion();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdtransaccion', []);

        return parent::getIdtransaccion();
    }

    /**
     * {@inheritDoc}
     */
    public function getIdtipster(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdtipster', []);

        return parent::getIdtipster();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdtipster(string $idtipster): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdtipster', [$idtipster]);

        return parent::setIdtipster($idtipster);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdpasarela(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdpasarela', []);

        return parent::getIdpasarela();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdpasarela(int $idpasarela): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdpasarela', [$idpasarela]);

        return parent::setIdpasarela($idpasarela);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdproducto(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdproducto', []);

        return parent::getIdproducto();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdproducto(?int $idproducto): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdproducto', [$idproducto]);

        return parent::setIdproducto($idproducto);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdusuario(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdusuario', []);

        return parent::getIdusuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdusuario(?int $idusuario): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdusuario', [$idusuario]);

        return parent::setIdusuario($idusuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getVisible(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVisible', []);

        return parent::getVisible();
    }

    /**
     * {@inheritDoc}
     */
    public function setVisible(bool $visible): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVisible', [$visible]);

        return parent::setVisible($visible);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(?string $email): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelephone(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelephone', []);

        return parent::getTelephone();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelephone(?string $telephone): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelephone', [$telephone]);

        return parent::setTelephone($telephone);
    }

    /**
     * {@inheritDoc}
     */
    public function getPayment(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPayment', []);

        return parent::getPayment();
    }

    /**
     * {@inheritDoc}
     */
    public function setPayment(?string $payment): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPayment', [$payment]);

        return parent::setPayment($payment);
    }

    /**
     * {@inheritDoc}
     */
    public function getProduct(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProduct', []);

        return parent::getProduct();
    }

    /**
     * {@inheritDoc}
     */
    public function setProduct(?string $product): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProduct', [$product]);

        return parent::setProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuantity(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuantity', []);

        return parent::getQuantity();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuantity(?string $quantity): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuantity', [$quantity]);

        return parent::setQuantity($quantity);
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrency(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCurrency', []);

        return parent::getCurrency();
    }

    /**
     * {@inheritDoc}
     */
    public function setCurrency(string $currency): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurrency', [$currency]);

        return parent::setCurrency($currency);
    }

    /**
     * {@inheritDoc}
     */
    public function getComision(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComision', []);

        return parent::getComision();
    }

    /**
     * {@inheritDoc}
     */
    public function setComision(?float $comision): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComision', [$comision]);

        return parent::setComision($comision);
    }

    /**
     * {@inheritDoc}
     */
    public function getImportePago(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImportePago', []);

        return parent::getImportePago();
    }

    /**
     * {@inheritDoc}
     */
    public function setImportePago(?float $importePago): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImportePago', [$importePago]);

        return parent::setImportePago($importePago);
    }

    /**
     * {@inheritDoc}
     */
    public function getPaypal(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPaypal', []);

        return parent::getPaypal();
    }

    /**
     * {@inheritDoc}
     */
    public function setPaypal(?string $paypal): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPaypal', [$paypal]);

        return parent::setPaypal($paypal);
    }

    /**
     * {@inheritDoc}
     */
    public function getCard(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCard', []);

        return parent::getCard();
    }

    /**
     * {@inheritDoc}
     */
    public function setCard(?string $card): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCard', [$card]);

        return parent::setCard($card);
    }

    /**
     * {@inheritDoc}
     */
    public function getDevice(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDevice', []);

        return parent::getDevice();
    }

    /**
     * {@inheritDoc}
     */
    public function setDevice(?string $device): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDevice', [$device]);

        return parent::setDevice($device);
    }

    /**
     * {@inheritDoc}
     */
    public function getIppayment(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIppayment', []);

        return parent::getIppayment();
    }

    /**
     * {@inheritDoc}
     */
    public function setIppayment(string $ippayment): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIppayment', [$ippayment]);

        return parent::setIppayment($ippayment);
    }

    /**
     * {@inheritDoc}
     */
    public function getDatepayment(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDatepayment', []);

        return parent::getDatepayment();
    }

    /**
     * {@inheritDoc}
     */
    public function setDatepayment(\DateTimeInterface $datepayment): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDatepayment', [$datepayment]);

        return parent::setDatepayment($datepayment);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', []);

        return parent::getCountry();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry(?string $country): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', [$country]);

        return parent::setCountry($country);
    }

    /**
     * {@inheritDoc}
     */
    public function getPaypalid(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPaypalid', []);

        return parent::getPaypalid();
    }

    /**
     * {@inheritDoc}
     */
    public function setPaypalid(?string $paypalid): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPaypalid', [$paypalid]);

        return parent::setPaypalid($paypalid);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdpago(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdpago', []);

        return parent::getIdpago();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdpago(?string $idpago): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdpago', [$idpago]);

        return parent::setIdpago($idpago);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaNumero(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaNumero', []);

        return parent::getFacturaNumero();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaNumero(?string $facturaNumero): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaNumero', [$facturaNumero]);

        return parent::setFacturaNumero($facturaNumero);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaReferencia(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaReferencia', []);

        return parent::getFacturaReferencia();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaReferencia(?string $facturaReferencia): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaReferencia', [$facturaReferencia]);

        return parent::setFacturaReferencia($facturaReferencia);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaLote(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaLote', []);

        return parent::getFacturaLote();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaLote(?string $facturaLote): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaLote', [$facturaLote]);

        return parent::setFacturaLote($facturaLote);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaIndice(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaIndice', []);

        return parent::getFacturaIndice();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaIndice(?int $facturaIndice): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaIndice', [$facturaIndice]);

        return parent::setFacturaIndice($facturaIndice);
    }

    /**
     * {@inheritDoc}
     */
    public function getIddescuentoProducto(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIddescuentoProducto', []);

        return parent::getIddescuentoProducto();
    }

    /**
     * {@inheritDoc}
     */
    public function setIddescuentoProducto(?int $iddescuentoProducto): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIddescuentoProducto', [$iddescuentoProducto]);

        return parent::setIddescuentoProducto($iddescuentoProducto);
    }

    /**
     * {@inheritDoc}
     */
    public function getPorcentajeDescuento(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPorcentajeDescuento', []);

        return parent::getPorcentajeDescuento();
    }

    /**
     * {@inheritDoc}
     */
    public function setPorcentajeDescuento(?string $porcentajeDescuento): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPorcentajeDescuento', [$porcentajeDescuento]);

        return parent::setPorcentajeDescuento($porcentajeDescuento);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaPorcentajeIva(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaPorcentajeIva', []);

        return parent::getFacturaPorcentajeIva();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaPorcentajeIva(?string $facturaPorcentajeIva): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaPorcentajeIva', [$facturaPorcentajeIva]);

        return parent::setFacturaPorcentajeIva($facturaPorcentajeIva);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaFecha(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaFecha', []);

        return parent::getFacturaFecha();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaFecha(?string $facturaFecha): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaFecha', [$facturaFecha]);

        return parent::setFacturaFecha($facturaFecha);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaFilepath(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaFilepath', []);

        return parent::getFacturaFilepath();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaFilepath(?string $facturaFilepath): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaFilepath', [$facturaFilepath]);

        return parent::setFacturaFilepath($facturaFilepath);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaFilename(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaFilename', []);

        return parent::getFacturaFilename();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaFilename(?string $facturaFilename): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaFilename', [$facturaFilename]);

        return parent::setFacturaFilename($facturaFilename);
    }

    /**
     * {@inheritDoc}
     */
    public function getFacturaFilecreated(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFacturaFilecreated', []);

        return parent::getFacturaFilecreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setFacturaFilecreated(?bool $facturaFilecreated): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFacturaFilecreated', [$facturaFilecreated]);

        return parent::setFacturaFilecreated($facturaFilecreated);
    }

    /**
     * {@inheritDoc}
     */
    public function getSaldoUtilizado(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSaldoUtilizado', []);

        return parent::getSaldoUtilizado();
    }

    /**
     * {@inheritDoc}
     */
    public function setSaldoUtilizado(?string $saldoUtilizado): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSaldoUtilizado', [$saldoUtilizado]);

        return parent::setSaldoUtilizado($saldoUtilizado);
    }

    /**
     * {@inheritDoc}
     */
    public function getDevuelto(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDevuelto', []);

        return parent::getDevuelto();
    }

    /**
     * {@inheritDoc}
     */
    public function setDevuelto(?bool $devuelto): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDevuelto', [$devuelto]);

        return parent::setDevuelto($devuelto);
    }

    /**
     * {@inheritDoc}
     */
    public function getTokenTarjeta(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTokenTarjeta', []);

        return parent::getTokenTarjeta();
    }

    /**
     * {@inheritDoc}
     */
    public function setTokenTarjeta(?string $tokenTarjeta): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTokenTarjeta', [$tokenTarjeta]);

        return parent::setTokenTarjeta($tokenTarjeta);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserPremiumpayIduserPremiumpay(): ?\App\Entity\Premiumpay\UserPremiumpay
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserPremiumpayIduserPremiumpay', []);

        return parent::getUserPremiumpayIduserPremiumpay();
    }

    /**
     * {@inheritDoc}
     */
    public function setUserPremiumpayIduserPremiumpay(?\App\Entity\Premiumpay\UserPremiumpay $userPremiumpayIduserPremiumpay): \App\Entity\Premiumpay\PasarelaBetandealPaymentdata
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserPremiumpayIduserPremiumpay', [$userPremiumpayIduserPremiumpay]);

        return parent::setUserPremiumpayIduserPremiumpay($userPremiumpayIduserPremiumpay);
    }

}
