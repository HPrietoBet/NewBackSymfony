<?php

namespace App\Repository\Main;

use App\Entity\Main\UsuariosAfiliadosPagosPremium;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuariosAfiliadosPagosPremium|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuariosAfiliadosPagosPremium|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuariosAfiliadosPagosPremium[]    findAll()
 * @method UsuariosAfiliadosPagosPremium[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosAfiliadosPagosPremiumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuariosAfiliadosPagosPremium::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsuariosAfiliadosPagosPremium $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(UsuariosAfiliadosPagosPremium $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UsuariosAfiliadosPagosPremium[] Returns an array of UsuariosAfiliadosPagosPremium objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsuariosAfiliadosPagosPremium
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
