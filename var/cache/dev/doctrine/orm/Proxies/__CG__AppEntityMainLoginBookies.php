<?php

namespace Proxies\__CG__\App\Entity\Main;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class LoginBookies extends \App\Entity\Main\LoginBookies implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'username', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'email', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'password', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'plainPassword', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'campanias', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'ultimoLogin', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'ip', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'activo'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'username', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'email', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'password', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'plainPassword', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'campanias', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'ultimoLogin', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'ip', '' . "\0" . 'App\\Entity\\Main\\LoginBookies' . "\0" . 'activo'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (LoginBookies $proxy) {
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
    public function getUsername(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', []);

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername(string $username): \App\Entity\Main\LoginBookies
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsername', [$username]);

        return parent::setUsername($username);
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
    public function setEmail(?string $email): \App\Entity\Main\LoginBookies
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
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
    public function setPassword(string $password): \App\Entity\Main\LoginBookies
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlainPassword(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlainPassword', []);

        return parent::getPlainPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlainPassword(string $plainPassword): \App\Entity\Main\LoginBookies
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlainPassword', [$plainPassword]);

        return parent::setPlainPassword($plainPassword);
    }

    /**
     * {@inheritDoc}
     */
    public function getCampanias(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCampanias', []);

        return parent::getCampanias();
    }

    /**
     * {@inheritDoc}
     */
    public function setCampanias(?string $campanias): \App\Entity\Main\LoginBookies
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCampanias', [$campanias]);

        return parent::setCampanias($campanias);
    }

    /**
     * {@inheritDoc}
     */
    public function getUltimoLogin(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUltimoLogin', []);

        return parent::getUltimoLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function setUltimoLogin(\DateTimeInterface $ultimoLogin): \App\Entity\Main\LoginBookies
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUltimoLogin', [$ultimoLogin]);

        return parent::setUltimoLogin($ultimoLogin);
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
    public function setIp(?string $ip): \App\Entity\Main\LoginBookies
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIp', [$ip]);

        return parent::setIp($ip);
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
    public function setActivo(bool $activo): \App\Entity\Main\LoginBookies
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActivo', [$activo]);

        return parent::setActivo($activo);
    }

}
