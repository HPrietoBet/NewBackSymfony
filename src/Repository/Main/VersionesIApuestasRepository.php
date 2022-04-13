<?php

namespace App\Repository\Main;

use App\Entity\Main\VersionesIapuestas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VersionesIapuestas|null find($id, $lockMode = null, $lockVersion = null)
 * @method VersionesIapuestas|null findOneBy(array $criteria, array $orderBy = null)
 * @method VersionesIapuestas[]    findAll()
 * @method VersionesIapuestas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VersionesIApuestasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VersionesIapuestas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(VersionesIapuestas $entity, bool $flush = true): void
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
    public function remove(VersionesIapuestas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return VersionesIapuestas[] Returns an array of VersionesIapuestas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VersionesIapuestas
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
