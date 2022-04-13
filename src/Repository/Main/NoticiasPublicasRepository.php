<?php

namespace App\Repository\Main;

use App\Entity\Main\NoticiasPublicas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NoticiasPublicas|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoticiasPublicas|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoticiasPublicas[]    findAll()
 * @method NoticiasPublicas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoticiasPublicasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoticiasPublicas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(NoticiasPublicas $entity, bool $flush = true): void
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
    public function remove(NoticiasPublicas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return NoticiasPublicas[] Returns an array of NoticiasPublicas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NoticiasPublicas
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
