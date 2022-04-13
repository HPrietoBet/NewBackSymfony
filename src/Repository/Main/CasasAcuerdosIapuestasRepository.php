<?php

namespace App\Repository\Main;

use App\Entity\Main\CasasAcuerdosIapuestas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CasasAcuerdosIapuestas|null find($id, $lockMode = null, $lockVersion = null)
 * @method CasasAcuerdosIapuestas|null findOneBy(array $criteria, array $orderBy = null)
 * @method CasasAcuerdosIapuestas[]    findAll()
 * @method CasasAcuerdosIapuestas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasasAcuerdosIapuestasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CasasAcuerdosIapuestas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CasasAcuerdosIapuestas $entity, bool $flush = true): void
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
    public function remove(CasasAcuerdosIapuestas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CasasAcuerdosIapuestas[] Returns an array of CasasAcuerdosIapuestas objects
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
    public function findOneBySomeField($value): ?CasasAcuerdosIapuestas
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
