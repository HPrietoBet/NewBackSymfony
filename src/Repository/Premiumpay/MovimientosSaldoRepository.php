<?php

namespace App\Repository\Premiumpay;

use App\Entity\Premiumpay\MovimientoSaldo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MovimientoSaldo|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovimientoSaldo|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovimientoSaldo[]    findAll()
 * @method MovimientoSaldo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovimientosSaldoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovimientoSaldo::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(MovimientoSaldo $entity, bool $flush = true): void
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
    public function remove(MovimientoSaldo $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return MovimientoSaldo[] Returns an array of MovimientoSaldo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MovimientoSaldo
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
