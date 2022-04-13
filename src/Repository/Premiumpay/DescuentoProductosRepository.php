<?php

namespace App\Repository\Premiumpay;

use App\Entity\Premiumpay\DescuentoProducto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DescuentoProducto|null find($id, $lockMode = null, $lockVersion = null)
 * @method DescuentoProducto|null findOneBy(array $criteria, array $orderBy = null)
 * @method DescuentoProducto[]    findAll()
 * @method DescuentoProducto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DescuentoProductosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DescuentoProducto::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DescuentoProducto $entity, bool $flush = true): void
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
    public function remove(DescuentoProducto $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DescuentoProducto[] Returns an array of DescuentoProducto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DescuentoProducto
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
