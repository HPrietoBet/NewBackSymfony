<?php

namespace Proxies\__CG__\App\Entity\Premiumpay;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Country extends \App\Entity\Premiumpay\Country implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'iso', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'name', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'nicename', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'iso3', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'numcode', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'phonecode'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'iso', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'name', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'nicename', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'iso3', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'numcode', '' . "\0" . 'App\\Entity\\Premiumpay\\Country' . "\0" . 'phonecode'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Country $proxy) {
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
    public function getIso(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIso', []);

        return parent::getIso();
    }

    /**
     * {@inheritDoc}
     */
    public function setIso(string $iso): \App\Entity\Premiumpay\Country
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIso', [$iso]);

        return parent::setIso($iso);
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name): \App\Entity\Premiumpay\Country
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getNicename(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNicename', []);

        return parent::getNicename();
    }

    /**
     * {@inheritDoc}
     */
    public function setNicename(string $nicename): \App\Entity\Premiumpay\Country
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNicename', [$nicename]);

        return parent::setNicename($nicename);
    }

    /**
     * {@inheritDoc}
     */
    public function getIso3(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIso3', []);

        return parent::getIso3();
    }

    /**
     * {@inheritDoc}
     */
    public function setIso3(?string $iso3): \App\Entity\Premiumpay\Country
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIso3', [$iso3]);

        return parent::setIso3($iso3);
    }

    /**
     * {@inheritDoc}
     */
    public function getNumcode(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNumcode', []);

        return parent::getNumcode();
    }

    /**
     * {@inheritDoc}
     */
    public function setNumcode(?int $numcode): \App\Entity\Premiumpay\Country
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNumcode', [$numcode]);

        return parent::setNumcode($numcode);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhonecode(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhonecode', []);

        return parent::getPhonecode();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhonecode(int $phonecode): \App\Entity\Premiumpay\Country
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhonecode', [$phonecode]);

        return parent::setPhonecode($phonecode);
    }

}
