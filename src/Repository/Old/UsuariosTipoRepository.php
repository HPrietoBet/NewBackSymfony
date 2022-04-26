<?php

namespace App\Repository\Old;

use App\Entity\Old\UsuariosTipo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuariosTipo|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuariosTipo|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuariosTipo[]    findAll()
 * @method UsuariosTipo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosTipoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuariosTipo::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsuariosTipo $entity, bool $flush = true): void
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
    public function remove(UsuariosTipo $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UsuariosTipo[] Returns an array of UsuariosTipo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsuariosTipo
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
