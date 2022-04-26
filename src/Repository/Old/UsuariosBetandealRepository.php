<?php

namespace App\Repository\Old;

use App\Entity\Old\UsuariosBetandeal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuariosBetandeal|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuariosBetandeal|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuariosBetandeal[]    findAll()
 * @method UsuariosBetandeal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosBetandealRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuariosBetandeal::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsuariosBetandeal $entity, bool $flush = true): void
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
    public function remove(UsuariosBetandeal $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UsuariosBetandeal[] Returns an array of UsuariosBetandeal objects
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
    public function findOneBySomeField($value): ?UsuariosBetandeal
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
