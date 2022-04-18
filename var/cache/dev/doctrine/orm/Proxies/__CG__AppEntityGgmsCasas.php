<?php

namespace Proxies\__CG__\App\Entity\Ggms;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Casas extends \App\Entity\Ggms\Casas implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'nombre', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'imagen', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'idCategoria', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'idPaises', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'responsable', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'bono', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'usuario', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'password', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'url', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'metodoCobro', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'procedimientoPago', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'contacto', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'activoFeedCuotas', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'feedCuotas', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'activoFeedStreaming', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'feedStreaming', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'baseline', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'requiereFactura', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'activo'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'nombre', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'imagen', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'idCategoria', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'idPaises', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'responsable', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'bono', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'usuario', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'password', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'url', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'metodoCobro', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'procedimientoPago', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'contacto', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'activoFeedCuotas', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'feedCuotas', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'activoFeedStreaming', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'feedStreaming', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'baseline', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'requiereFactura', '' . "\0" . 'App\\Entity\\Ggms\\Casas' . "\0" . 'activo'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Casas $proxy) {
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
    public function getNombre(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', []);

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre(string $nombre): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', [$nombre]);

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getImagen(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImagen', []);

        return parent::getImagen();
    }

    /**
     * {@inheritDoc}
     */
    public function setImagen(string $imagen): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImagen', [$imagen]);

        return parent::setImagen($imagen);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdCategoria(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdCategoria', []);

        return parent::getIdCategoria();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdCategoria(?int $idCategoria): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCategoria', [$idCategoria]);

        return parent::setIdCategoria($idCategoria);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdPaises(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdPaises', []);

        return parent::getIdPaises();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdPaises(string $idPaises): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdPaises', [$idPaises]);

        return parent::setIdPaises($idPaises);
    }

    /**
     * {@inheritDoc}
     */
    public function getResponsable(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResponsable', []);

        return parent::getResponsable();
    }

    /**
     * {@inheritDoc}
     */
    public function setResponsable(int $responsable): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResponsable', [$responsable]);

        return parent::setResponsable($responsable);
    }

    /**
     * {@inheritDoc}
     */
    public function getBono(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBono', []);

        return parent::getBono();
    }

    /**
     * {@inheritDoc}
     */
    public function setBono(string $bono): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBono', [$bono]);

        return parent::setBono($bono);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuario(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuario', []);

        return parent::getUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsuario(?string $usuario): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsuario', [$usuario]);

        return parent::setUsuario($usuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', []);

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword(?string $password): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getUrl(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUrl', []);

        return parent::getUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function setUrl(?string $url): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUrl', [$url]);

        return parent::setUrl($url);
    }

    /**
     * {@inheritDoc}
     */
    public function getMetodoCobro(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMetodoCobro', []);

        return parent::getMetodoCobro();
    }

    /**
     * {@inheritDoc}
     */
    public function setMetodoCobro(?string $metodoCobro): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMetodoCobro', [$metodoCobro]);

        return parent::setMetodoCobro($metodoCobro);
    }

    /**
     * {@inheritDoc}
     */
    public function getProcedimientoPago(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProcedimientoPago', []);

        return parent::getProcedimientoPago();
    }

    /**
     * {@inheritDoc}
     */
    public function setProcedimientoPago(?string $procedimientoPago): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProcedimientoPago', [$procedimientoPago]);

        return parent::setProcedimientoPago($procedimientoPago);
    }

    /**
     * {@inheritDoc}
     */
    public function getContacto(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContacto', []);

        return parent::getContacto();
    }

    /**
     * {@inheritDoc}
     */
    public function setContacto(?string $contacto): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContacto', [$contacto]);

        return parent::setContacto($contacto);
    }

    /**
     * {@inheritDoc}
     */
    public function getActivoFeedCuotas(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivoFeedCuotas', []);

        return parent::getActivoFeedCuotas();
    }

    /**
     * {@inheritDoc}
     */
    public function setActivoFeedCuotas(bool $activoFeedCuotas): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivoFeedCuotas', [$activoFeedCuotas]);

        return parent::setActivoFeedCuotas($activoFeedCuotas);
    }

    /**
     * {@inheritDoc}
     */
    public function getFeedCuotas(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFeedCuotas', []);

        return parent::getFeedCuotas();
    }

    /**
     * {@inheritDoc}
     */
    public function setFeedCuotas(?string $feedCuotas): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFeedCuotas', [$feedCuotas]);

        return parent::setFeedCuotas($feedCuotas);
    }

    /**
     * {@inheritDoc}
     */
    public function getActivoFeedStreaming(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivoFeedStreaming', []);

        return parent::getActivoFeedStreaming();
    }

    /**
     * {@inheritDoc}
     */
    public function setActivoFeedStreaming(bool $activoFeedStreaming): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivoFeedStreaming', [$activoFeedStreaming]);

        return parent::setActivoFeedStreaming($activoFeedStreaming);
    }

    /**
     * {@inheritDoc}
     */
    public function getFeedStreaming(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFeedStreaming', []);

        return parent::getFeedStreaming();
    }

    /**
     * {@inheritDoc}
     */
    public function setFeedStreaming(?string $feedStreaming): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFeedStreaming', [$feedStreaming]);

        return parent::setFeedStreaming($feedStreaming);
    }

    /**
     * {@inheritDoc}
     */
    public function getBaseline(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBaseline', []);

        return parent::getBaseline();
    }

    /**
     * {@inheritDoc}
     */
    public function setBaseline(?string $baseline): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBaseline', [$baseline]);

        return parent::setBaseline($baseline);
    }

    /**
     * {@inheritDoc}
     */
    public function getRequiereFactura(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRequiereFactura', []);

        return parent::getRequiereFactura();
    }

    /**
     * {@inheritDoc}
     */
    public function setRequiereFactura(bool $requiereFactura): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRequiereFactura', [$requiereFactura]);

        return parent::setRequiereFactura($requiereFactura);
    }

    /**
     * {@inheritDoc}
     */
    public function getActivo(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivo', []);

        return parent::getActivo();
    }

    /**
     * {@inheritDoc}
     */
    public function setActivo(bool $activo): \App\Entity\Ggms\Casas
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivo', [$activo]);

        return parent::setActivo($activo);
    }

}
