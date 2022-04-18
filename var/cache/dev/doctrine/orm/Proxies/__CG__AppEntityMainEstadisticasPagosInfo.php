<?php

namespace Proxies\__CG__\App\Entity\Main;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class EstadisticasPagosInfo extends \App\Entity\Main\EstadisticasPagosInfo implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idUsuarioAfiliado', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idCamp', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idCasa', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idUsuario', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'fecha', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'importe', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'jugadores', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'totalImporte', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'totalJugadores', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idPago', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'estadoPago'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idUsuarioAfiliado', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idCamp', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idCasa', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idUsuario', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'fecha', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'importe', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'jugadores', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'totalImporte', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'totalJugadores', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'idPago', '' . "\0" . 'App\\Entity\\Main\\EstadisticasPagosInfo' . "\0" . 'estadoPago'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (EstadisticasPagosInfo $proxy) {
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
    public function getIdUsuarioAfiliado(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdUsuarioAfiliado', []);

        return parent::getIdUsuarioAfiliado();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdUsuarioAfiliado(int $idUsuarioAfiliado): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUsuarioAfiliado', [$idUsuarioAfiliado]);

        return parent::setIdUsuarioAfiliado($idUsuarioAfiliado);
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
    public function setIdCamp(int $idCamp): \App\Entity\Main\EstadisticasPagosInfo
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
    public function setIdCasa(int $idCasa): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCasa', [$idCasa]);

        return parent::setIdCasa($idCasa);
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
    public function setIdUsuario(int $idUsuario): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUsuario', [$idUsuario]);

        return parent::setIdUsuario($idUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getFecha(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFecha', []);

        return parent::getFecha();
    }

    /**
     * {@inheritDoc}
     */
    public function setFecha(\DateTimeInterface $fecha): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFecha', [$fecha]);

        return parent::setFecha($fecha);
    }

    /**
     * {@inheritDoc}
     */
    public function getImporte(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImporte', []);

        return parent::getImporte();
    }

    /**
     * {@inheritDoc}
     */
    public function setImporte(float $importe): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImporte', [$importe]);

        return parent::setImporte($importe);
    }

    /**
     * {@inheritDoc}
     */
    public function getJugadores(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJugadores', []);

        return parent::getJugadores();
    }

    /**
     * {@inheritDoc}
     */
    public function setJugadores(int $jugadores): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJugadores', [$jugadores]);

        return parent::setJugadores($jugadores);
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalImporte(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTotalImporte', []);

        return parent::getTotalImporte();
    }

    /**
     * {@inheritDoc}
     */
    public function setTotalImporte(float $totalImporte): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTotalImporte', [$totalImporte]);

        return parent::setTotalImporte($totalImporte);
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalJugadores(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTotalJugadores', []);

        return parent::getTotalJugadores();
    }

    /**
     * {@inheritDoc}
     */
    public function setTotalJugadores(int $totalJugadores): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTotalJugadores', [$totalJugadores]);

        return parent::setTotalJugadores($totalJugadores);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdPago(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdPago', []);

        return parent::getIdPago();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdPago(int $idPago): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdPago', [$idPago]);

        return parent::setIdPago($idPago);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstadoPago(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstadoPago', []);

        return parent::getEstadoPago();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstadoPago(int $estadoPago): \App\Entity\Main\EstadisticasPagosInfo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstadoPago', [$estadoPago]);

        return parent::setEstadoPago($estadoPago);
    }

}
