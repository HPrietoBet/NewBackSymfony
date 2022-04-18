<?php

namespace Proxies\__CG__\App\Entity\Main;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class UsuariosAfiliados extends \App\Entity\Main\UsuariosAfiliados implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'idUserAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'fechaAlta', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'idCamp', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'urlOriginal', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'urlAutomatica', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'urlCorta', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'comision', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'condicionesAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'activoAfiliado'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'idUserAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'fechaAlta', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'idCamp', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'urlOriginal', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'urlAutomatica', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'urlCorta', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'comision', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'condicionesAfiliado', '' . "\0" . 'App\\Entity\\Main\\UsuariosAfiliados' . "\0" . 'activoAfiliado'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (UsuariosAfiliados $proxy) {
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
    public function getIdUserAfiliado(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdUserAfiliado();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdUserAfiliado', []);

        return parent::getIdUserAfiliado();
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaAlta(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaAlta', []);

        return parent::getFechaAlta();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaAlta(\DateTimeInterface $fechaAlta): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaAlta', [$fechaAlta]);

        return parent::setFechaAlta($fechaAlta);
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
    public function setId(int $id): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        return parent::setId($id);
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
    public function setIdCamp(int $idCamp): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCamp', [$idCamp]);

        return parent::setIdCamp($idCamp);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrlOriginal(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrlOriginal', []);

        return parent::getUrlOriginal();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrlOriginal(string $urlOriginal): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlOriginal', [$urlOriginal]);

        return parent::setUrlOriginal($urlOriginal);
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
    public function setUrlAutomatica(string $urlAutomatica): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlAutomatica', [$urlAutomatica]);

        return parent::setUrlAutomatica($urlAutomatica);
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
    public function setUrlCorta(string $urlCorta): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrlCorta', [$urlCorta]);

        return parent::setUrlCorta($urlCorta);
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
    public function setComision(float $comision): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComision', [$comision]);

        return parent::setComision($comision);
    }

    /**
     * {@inheritDoc}
     */
    public function getCondicionesAfiliado(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCondicionesAfiliado', []);

        return parent::getCondicionesAfiliado();
    }

    /**
     * {@inheritDoc}
     */
    public function setCondicionesAfiliado(?string $condicionesAfiliado): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCondicionesAfiliado', [$condicionesAfiliado]);

        return parent::setCondicionesAfiliado($condicionesAfiliado);
    }

    /**
     * {@inheritDoc}
     */
    public function getActivoAfiliado(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivoAfiliado', []);

        return parent::getActivoAfiliado();
    }

    /**
     * {@inheritDoc}
     */
    public function setActivoAfiliado(string $activoAfiliado): \App\Entity\Main\UsuariosAfiliados
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivoAfiliado', [$activoAfiliado]);

        return parent::setActivoAfiliado($activoAfiliado);
    }

}
