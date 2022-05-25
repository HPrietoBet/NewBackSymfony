<?php

namespace App\Repository\Main;

use App\Entity\Main\CustomLinks;
use App\Entity\Main\CustomPages;
use App\Entity\Main\LoginBusiness;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomPages|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomPages|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomPages[]    findAll()
 * @method CustomPages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomPagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomPages::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CustomPages $entity, bool $flush = true): void
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
    public function remove(CustomPages $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CustomPages[] Returns an array of CustomPages objects
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
    public function findOneBySomeField($value): ?CustomPages
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllInfo(){
        return $this->createQueryBuilder('s')
            ->leftJoin(LoginBusiness::class, 'lb', 'with', 's.idUsuario = lb.id')
            ->getQuery()
            ->getResult();
    }
}
