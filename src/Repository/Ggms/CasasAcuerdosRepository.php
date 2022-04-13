<?php

namespace App\Repository\Ggms;

use App\Entity\Ggms\CasasAcuerdos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CasasAcuerdos|null find($id, $lockMode = null, $lockVersion = null)
 * @method CasasAcuerdos|null findOneBy(array $criteria, array $orderBy = null)
 * @method CasasAcuerdos[]    findAll()
 * @method CasasAcuerdos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasasAcuerdosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CasasAcuerdos::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CasasAcuerdos $entity, bool $flush = true): void
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
    public function remove(CasasAcuerdos $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CasasAcuerdos[] Returns an array of CasasAcuerdos objects
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
    public function findOneBySomeField($value): ?CasasAcuerdos
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
