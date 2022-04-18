<?php

namespace Proxies\__CG__\App\Entity\Main;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class UsuariosAfiliadosVariables extends \App\Entity\Main\UsuariosAfiliadosVariables implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'idVariables', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'idCampBid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'idCamp', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'idUserAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'bid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'pid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'bssid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'bsmid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlInicial', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlMobile', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlGenerada', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlCorta', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlAutomatica', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'activoAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'actsport'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'idVariables', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'idCampBid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'idCamp', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'idUserAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'bid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'pid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'bssid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'bsmid', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlInicial', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlMobile', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlGenerada', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlCorta', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'urlAutomatica', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'activoAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliadosVariables' . "\0" . 'actsport'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (UsuariosAfiliadosVariables $proxy) {
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
    public function getIdVariables(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdVariables();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdVariables', []);

        return parent::getIdVariables();
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
    public function setIdCampBid(int $idCampBid): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCampBid', [$idCampBid]);

        return parent::setIdCampBid($idCampBid);
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
    public function setIdCamp(int $idCamp): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCamp', [$idCamp]);

        return parent::setIdCamp($idCamp);
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
    public function setIdUserAfiliado(int $idUserAfiliado): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUserAfiliado', [$idUserAfiliado]);

        return parent::setIdUserAfiliado($idUserAfiliado);
    }

    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId(int $id): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getBid(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBid', []);

        return parent::getBid();
    }

    /**
     * {@inheritDoc}
     */
    public function setBid(?string $bid): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBid', [$bid]);

        return parent::setBid($bid);
    }

    /**
     * {@inheritDoc}
     */
    public function getPid(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPid', []);

        return parent::getPid();
    }

    /**
     * {@inheritDoc}
     */
    public function setPid(?string $pid): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPid', [$pid]);

        return parent::setPid($pid);
    }

    /**
     * {@inheritDoc}
     */
    public function getBssid(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBssid', []);

        return parent::getBssid();
    }

    /**
     * {@inheritDoc}
     */
    public function setBssid(?string $bssid): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBssid', [$bssid]);

        return parent::setBssid($bssid);
    }

    /**
     * {@inheritDoc}
     */
    public function getBsmid(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBsmid', []);

        return parent::getBsmid();
    }

    /**
     * {@inheritDoc}
     */
    public function setBsmid(?string $bsmid): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBsmid', [$bsmid]);

        return parent::setBsmid($bsmid);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlInicial(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrlInicial', []);

        return parent::getUrlInicial();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrlInicial(?string $urlInicial): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlInicial', [$urlInicial]);

        return parent::setUrlInicial($urlInicial);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlMobile(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrlMobile', []);

        return parent::getUrlMobile();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrlMobile(?string $urlMobile): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlMobile', [$urlMobile]);

        return parent::setUrlMobile($urlMobile);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlGenerada(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrlGenerada', []);

        return parent::getUrlGenerada();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrlGenerada(?string $urlGenerada): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlGenerada', [$urlGenerada]);

        return parent::setUrlGenerada($urlGenerada);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlCorta(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrlCorta', []);

        return parent::getUrlCorta();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrlCorta(?string $urlCorta): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlCorta', [$urlCorta]);

        return parent::setUrlCorta($urlCorta);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlAutomatica(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrlAutomatica', []);

        return parent::getUrlAutomatica();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrlAutomatica(?string $urlAutomatica): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlAutomatica', [$urlAutomatica]);

        return parent::setUrlAutomatica($urlAutomatica);
    }

    /**
     * {@inheritDoc}
     */
    public function getActivoAfiliado(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivoAfiliado', []);

        return parent::getActivoAfiliado();
    }

    /**
     * {@inheritDoc}
     */
    public function setActivoAfiliado(bool $activoAfiliado): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivoAfiliado', [$activoAfiliado]);

        return parent::setActivoAfiliado($activoAfiliado);
    }

    /**
     * {@inheritDoc}
     */
    public function getActsport(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActsport', []);

        return parent::getActsport();
    }

    /**
     * {@inheritDoc}
     */
    public function setActsport(bool $actsport): \App\Entity\Main\UsuariosAfiliadosVariables
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActsport', [$actsport]);

        return parent::setActsport($actsport);
    }

}
