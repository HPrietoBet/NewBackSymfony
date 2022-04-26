<?php

namespace App\Repository\Old;

use App\Entity\Old\CampaniasEnlacesPosicion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CampaniasEnlacesPosicion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampaniasEnlacesPosicion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampaniasEnlacesPosicion[]    findAll()
 * @method CampaniasEnlacesPosicion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaniasEnlacesPosicionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CampaniasEnlacesPosicion::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CampaniasEnlacesPosicion $entity, bool $flush = true): void
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
    public function remove(CampaniasEnlacesPosicion $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CampaniasEnlacesPosicion[] Returns an array of CampaniasEnlacesPosicion objects
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
    public function findOneBySomeField($value): ?CampaniasEnlacesPosicion
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
