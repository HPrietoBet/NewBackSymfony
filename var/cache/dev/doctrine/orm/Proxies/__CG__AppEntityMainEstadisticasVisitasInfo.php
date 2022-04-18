<?php

namespace Proxies\__CG__\App\Entity\Main;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class EstadisticasVisitasInfo extends \App\Entity\Main\EstadisticasVisitasInfo implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idIp', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idUserAfiliado', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idUsuario', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idCamp', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idCasa', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'fechaIp', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'clicks', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'clicksUnicos', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'clicksTotal', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'clicksUnicosTotal'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idIp', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idUserAfiliado', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idUsuario', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idCamp', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'idCasa', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'fechaIp', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'clicks', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'clicksUnicos', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'clicksTotal', '' . "\0" . 'App\\Entity\\Main\\EstadisticasVisitasInfo' . "\0" . 'clicksUnicosTotal'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (EstadisticasVisitasInfo $proxy) {
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
    public function getIdIp(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdIp', []);

        return parent::getIdIp();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdIp(int $idIp): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdIp', [$idIp]);

        return parent::setIdIp($idIp);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdUserAfiliado(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdUserAfiliado', []);

        return parent::getIdUserAfiliado();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdUserAfiliado(int $idUserAfiliado): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUserAfiliado', [$idUserAfiliado]);

        return parent::setIdUserAfiliado($idUserAfiliado);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdUsuario(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdUsuario', []);

        return parent::getIdUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdUsuario(int $idUsuario): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUsuario', [$idUsuario]);

        return parent::setIdUsuario($idUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdCamp(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdCamp', []);

        return parent::getIdCamp();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdCamp(int $idCamp): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCamp', [$idCamp]);

        return parent::setIdCamp($idCamp);
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
    public function setIdCasa(int $idCasa): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCasa', [$idCasa]);

        return parent::setIdCasa($idCasa);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaIp(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaIp', []);

        return parent::getFechaIp();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaIp(\DateTimeInterface $fechaIp): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaIp', [$fechaIp]);

        return parent::setFechaIp($fechaIp);
    }

    /**
     * {@inheritDoc}
     */
    public function getClicks(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClicks', []);

        return parent::getClicks();
    }

    /**
     * {@inheritDoc}
     */
    public function setClicks(int $clicks): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClicks', [$clicks]);

        return parent::setClicks($clicks);
    }

    /**
     * {@inheritDoc}
     */
    public function getClicksUnicos(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClicksUnicos', []);

        return parent::getClicksUnicos();
    }

    /**
     * {@inheritDoc}
     */
    public function setClicksUnicos(int $clicksUnicos): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClicksUnicos', [$clicksUnicos]);

        return parent::setClicksUnicos($clicksUnicos);
    }

    /**
     * {@inheritDoc}
     */
    public function getClicksTotal(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClicksTotal', []);

        return parent::getClicksTotal();
    }

    /**
     * {@inheritDoc}
     */
    public function setClicksTotal(int $clicksTotal): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClicksTotal', [$clicksTotal]);

        return parent::setClicksTotal($clicksTotal);
    }

    /**
     * {@inheritDoc}
     */
    public function getClicksUnicosTotal(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClicksUnicosTotal', []);

        return parent::getClicksUnicosTotal();
    }

    /**
     * {@inheritDoc}
     */
    public function setClicksUnicosTotal(int $clicksUnicosTotal): \App\Entity\Main\EstadisticasVisitasInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClicksUnicosTotal', [$clicksUnicosTotal]);

        return parent::setClicksUnicosTotal($clicksUnicosTotal);
    }

}
