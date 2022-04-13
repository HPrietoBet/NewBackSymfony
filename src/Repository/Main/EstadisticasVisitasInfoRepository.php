<?php

namespace App\Repository\Main;

use App\Entity\Main\EstadisticasVisitasInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EstadisticasVisitasInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadisticasVisitasInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadisticasVisitasInfo[]    findAll()
 * @method EstadisticasVisitasInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadisticasVisitasInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstadisticasVisitasInfo::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EstadisticasVisitasInfo $entity, bool $flush = true): void
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
    public function remove(EstadisticasVisitasInfo $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EstadisticasVisitasInfo[] Returns an array of EstadisticasVisitasInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EstadisticasVisitasInfo
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
