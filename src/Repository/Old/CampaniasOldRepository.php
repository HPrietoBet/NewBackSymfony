<?php

namespace App\Repository\Old;

use App\Entity\Old\CampaniasOld;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CampaniasOld|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampaniasOld|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampaniasOld[]    findAll()
 * @method CampaniasOld[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaniasOldRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CampaniasOld::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CampaniasOld $entity, bool $flush = true): void
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
    public function remove(CampaniasOld $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CampaniasOld[] Returns an array of CampaniasOld objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CampaniasOld
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
