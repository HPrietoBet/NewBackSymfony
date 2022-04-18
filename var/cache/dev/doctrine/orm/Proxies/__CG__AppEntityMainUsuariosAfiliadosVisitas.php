<?php

namespace Proxies\__CG__\App\Entity\Main;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class UsuariosAfiliadosVisitas extends \App\Entity\Main\UsuariosAfiliadosVisitas implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'idIp', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'idUserAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'fechaIp', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'fechaUltimaVisita', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'ip', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'visitas', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'device', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'idCampBid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'idSport'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'idIp', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'idUserAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'fechaIp', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'fechaUltimaVisita', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'ip', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'visitas', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'device', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'idCampBid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVisitas' . "\0" . 'idSport'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (UsuariosAfiliadosVisitas $proxy) {
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
    public function getIdIp(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdIp();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdIp', []);

        return parent::getIdIp();
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
    public function setIdUserAfiliado(int $idUserAfiliado): \App\Entity\Main\UsuariosAfiliadosVisitas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUserAfiliado', [$idUserAfiliado]);

        return parent::setIdUserAfiliado($idUserAfiliado);
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
    public function setFechaIp(\DateTimeInterface $fechaIp): \App\Entity\Main\UsuariosAfiliadosVisitas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaIp', [$fechaIp]);

        return parent::setFechaIp($fechaIp);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaUltimaVisita(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaUltimaVisita', []);

        return parent::getFechaUltimaVisita();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaUltimaVisita(?\DateTimeInterface $fechaUltimaVisita): \App\Entity\Main\UsuariosAfiliadosVisitas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaUltimaVisita', [$fechaUltimaVisita]);

        return parent::setFechaUltimaVisita($fechaUltimaVisita);
    }

    /**
     * {@inheritDoc}
     */
    public function getIp(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIp', []);

        return parent::getIp();
    }

    /**
     * {@inheritDoc}
     */
    public function setIp(string $ip): \App\Entity\Main\UsuariosAfiliadosVisitas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIp', [$ip]);

        return parent::setIp($ip);
    }

    /**
     * {@inheritDoc}
     */
    public function getVisitas(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVisitas', []);

        return parent::getVisitas();
    }

    /**
     * {@inheritDoc}
     */
    public function setVisitas(int $visitas): \App\Entity\Main\UsuariosAfiliadosVisitas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVisitas', [$visitas]);

        return parent::setVisitas($visitas);
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
    public function setDevice(?string $device): \App\Entity\Main\UsuariosAfiliadosVisitas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDevice', [$device]);

        return parent::setDevice($device);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdCampBid(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdCampBid', []);

        return parent::getIdCampBid();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdCampBid(?int $idCampBid): \App\Entity\Main\UsuariosAfiliadosVisitas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCampBid', [$idCampBid]);

        return parent::setIdCampBid($idCampBid);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdSport(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdSport', []);

        return parent::getIdSport();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdSport(?int $idSport): \App\Entity\Main\UsuariosAfiliadosVisitas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdSport', [$idSport]);

        return parent::setIdSport($idSport);
    }

}
