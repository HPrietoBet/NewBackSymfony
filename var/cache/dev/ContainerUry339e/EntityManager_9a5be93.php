<?php

namespace ContainerUry339e;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderdea55 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer0f2c9 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties0cabc = [
        
    ];

    public function getConnection()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getConnection', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getMetadataFactory', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getExpressionBuilder', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'beginTransaction', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getCache', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getCache();
    }

    public function transactional($func)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'transactional', array('func' => $func), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'wrapInTransaction', array('func' => $func), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'commit', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->commit();
    }

    public function rollback()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'rollback', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getClassMetadata', array('className' => $className), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'createQuery', array('dql' => $dql), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'createNamedQuery', array('name' => $name), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'createQueryBuilder', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'flush', array('entity' => $entity), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'clear', array('entityName' => $entityName), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->clear($entityName);
    }

    public function close()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'close', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->close();
    }

    public function persist($entity)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'persist', array('entity' => $entity), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'remove', array('entity' => $entity), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'refresh', array('entity' => $entity), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'detach', array('entity' => $entity), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'merge', array('entity' => $entity), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getRepository', array('entityName' => $entityName), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'contains', array('entity' => $entity), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getEventManager', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getConfiguration', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'isOpen', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getUnitOfWork', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getProxyFactory', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'initializeObject', array('obj' => $obj), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'getFilters', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'isFiltersStateClean', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'hasFilters', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return $this->valueHolderdea55->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer0f2c9 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderdea55) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderdea55 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderdea55->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, '__get', ['name' => $name], $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        if (isset(self::$publicProperties0cabc[$name])) {
            return $this->valueHolderdea55->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderdea55;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderdea55;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderdea55;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderdea55;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, '__isset', array('name' => $name), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderdea55;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderdea55;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, '__unset', array('name' => $name), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderdea55;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderdea55;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, '__clone', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        $this->valueHolderdea55 = clone $this->valueHolderdea55;
    }

    public function __sleep()
    {
        $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, '__sleep', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;

        return array('valueHolderdea55');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer0f2c9 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer0f2c9;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer0f2c9 && ($this->initializer0f2c9->__invoke($valueHolderdea55, $this, 'initializeProxy', array(), $this->initializer0f2c9) || 1) && $this->valueHolderdea55 = $valueHolderdea55;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderdea55;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderdea55;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
