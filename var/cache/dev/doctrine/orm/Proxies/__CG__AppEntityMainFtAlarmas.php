<?php

namespace Proxies\__CG__\App\Entity\Main;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class FtAlarmas extends \App\Entity\Main\FtAlarmas implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrId', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrDate', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrType', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrData', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrView', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrUmbral', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrUniqueKey'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrId', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrDate', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrType', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrData', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrView', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrUmbral', '' . "\0" . 'App\\Entity\\Main\\FtAlarmas' . "\0" . 'alrUniqueKey'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (FtAlarmas $proxy) {
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
    public function getAlrId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getAlrId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlrId', []);

        return parent::getAlrId();
    }

    /**
     * {@inheritDoc}
     */
    public function getAlrDate(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlrDate', []);

        return parent::getAlrDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlrDate(\DateTimeInterface $alrDate): \App\Entity\Main\FtAlarmas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlrDate', [$alrDate]);

        return parent::setAlrDate($alrDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlrType(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlrType', []);

        return parent::getAlrType();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlrType(?string $alrType): \App\Entity\Main\FtAlarmas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlrType', [$alrType]);

        return parent::setAlrType($alrType);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlrData(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlrData', []);

        return parent::getAlrData();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlrData(?string $alrData): \App\Entity\Main\FtAlarmas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlrData', [$alrData]);

        return parent::setAlrData($alrData);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlrView(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlrView', []);

        return parent::getAlrView();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlrView(?bool $alrView): \App\Entity\Main\FtAlarmas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlrView', [$alrView]);

        return parent::setAlrView($alrView);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlrUmbral(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlrUmbral', []);

        return parent::getAlrUmbral();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlrUmbral(?float $alrUmbral): \App\Entity\Main\FtAlarmas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlrUmbral', [$alrUmbral]);

        return parent::setAlrUmbral($alrUmbral);
    }

    /**
     * {@inheritDoc}
     */
    public function getAlrUniqueKey(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlrUniqueKey', []);

        return parent::getAlrUniqueKey();
    }

    /**
     * {@inheritDoc}
     */
    public function setAlrUniqueKey(?string $alrUniqueKey): \App\Entity\Main\FtAlarmas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlrUniqueKey', [$alrUniqueKey]);

        return parent::setAlrUniqueKey($alrUniqueKey);
    }

}
