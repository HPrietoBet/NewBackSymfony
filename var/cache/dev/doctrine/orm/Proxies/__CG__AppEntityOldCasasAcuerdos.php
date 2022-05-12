<?php

namespace Proxies\__CG__\App\Entity\Old;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CasasAcuerdos extends \App\Entity\Old\CasasAcuerdos implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'idCasa', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'cpa', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'cpaMoneda', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'rs', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'fee', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'feeMoneda', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'acuerdoActivo'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'idCasa', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'cpa', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'cpaMoneda', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'rs', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'fee', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'feeMoneda', '' . "\0" . 'App\\Entity\\Old\\CasasAcuerdos' . "\0" . 'acuerdoActivo'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CasasAcuerdos $proxy) {
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
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getIdCasa(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdCasa', []);

        return parent::getIdCasa();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdCasa(int $idCasa): \App\Entity\Old\CasasAcuerdos
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCasa', [$idCasa]);

        return parent::setIdCasa($idCasa);
    }

    /**
     * {@inheritDoc}
     */
    public function getCpa(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCpa', []);

        return parent::getCpa();
    }

    /**
     * {@inheritDoc}
     */
    public function setCpa(string $cpa): \App\Entity\Old\CasasAcuerdos
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCpa', [$cpa]);

        return parent::setCpa($cpa);
    }

    /**
     * {@inheritDoc}
     */
    public function getCpaMoneda(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCpaMoneda', []);

        return parent::getCpaMoneda();
    }

    /**
     * {@inheritDoc}
     */
    public function setCpaMoneda(string $cpaMoneda): \App\Entity\Old\CasasAcuerdos
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCpaMoneda', [$cpaMoneda]);

        return parent::setCpaMoneda($cpaMoneda);
    }

    /**
     * {@inheritDoc}
     */
    public function getRs(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRs', []);

        return parent::getRs();
    }

    /**
     * {@inheritDoc}
     */
    public function setRs(string $rs): \App\Entity\Old\CasasAcuerdos
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRs', [$rs]);

        return parent::setRs($rs);
    }

    /**
     * {@inheritDoc}
     */
    public function getFee(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFee', []);

        return parent::getFee();
    }

    /**
     * {@inheritDoc}
     */
    public function setFee(string $fee): \App\Entity\Old\CasasAcuerdos
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFee', [$fee]);

        return parent::setFee($fee);
    }

    /**
     * {@inheritDoc}
     */
    public function getFeeMoneda(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFeeMoneda', []);

        return parent::getFeeMoneda();
    }

    /**
     * {@inheritDoc}
     */
    public function setFeeMoneda(string $feeMoneda): \App\Entity\Old\CasasAcuerdos
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFeeMoneda', [$feeMoneda]);

        return parent::setFeeMoneda($feeMoneda);
    }

    /**
     * {@inheritDoc}
     */
    public function getAcuerdoActivo(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAcuerdoActivo', []);

        return parent::getAcuerdoActivo();
    }

    /**
     * {@inheritDoc}
     */
    public function setAcuerdoActivo(?bool $acuerdoActivo): \App\Entity\Old\CasasAcuerdos
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAcuerdoActivo', [$acuerdoActivo]);

        return parent::setAcuerdoActivo($acuerdoActivo);
    }

}
