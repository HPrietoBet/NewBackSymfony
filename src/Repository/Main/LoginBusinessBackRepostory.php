<?php

namespace App\Repository\Main;

use App\Entity\Main\LoginBusinessBack;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoginBusinessBack|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginBusinessBack|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginBusinessBack[]    findAll()
 * @method LoginBusinessBack[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoginBusinessBackRepostory extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoginBusinessBack::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(LoginBusinessBack $entity, bool $flush = true): void
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
    public function remove(LoginBusinessBack $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return LoginBusinessBack[] Returns an array of LoginBusinessBack objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoginBusinessBack
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
