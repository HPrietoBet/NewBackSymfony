<?php

namespace App\Repository\Main;

use App\Entity\Main\CasasDeApuestasAcuerdos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CasasDeApuestasAcuerdos|null find($id, $lockMode = null, $lockVersion = null)
 * @method CasasDeApuestasAcuerdos|null findOneBy(array $criteria, array $orderBy = null)
 * @method CasasDeApuestasAcuerdos[]    findAll()
 * @method CasasDeApuestasAcuerdos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasasDeApuestasAcuerdosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CasasDeApuestasAcuerdos::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CasasDeApuestasAcuerdos $entity, bool $flush = true): void
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
    public function remove(CasasDeApuestasAcuerdos $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CasasDeApuestasAcuerdos[] Returns an array of CasasDeApuestasAcuerdos objects
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
    public function findOneBySomeField($value): ?CasasDeApuestasAcuerdos
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
