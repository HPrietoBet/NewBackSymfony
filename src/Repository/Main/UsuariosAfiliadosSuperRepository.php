<?php

namespace App\Repository\Main;

use App\Entity\Main\UsuariosAfiliadosSuper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuariosAfiliadosSuper|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuariosAfiliadosSuper|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuariosAfiliadosSuper[]    findAll()
 * @method UsuariosAfiliadosSuper[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosAfiliadosSuperRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuariosAfiliadosSuper::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsuariosAfiliadosSuper $entity, bool $flush = true): void
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
    public function remove(UsuariosAfiliadosSuper $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UsuariosAfiliadosSuper[] Returns an array of UsuariosAfiliadosSuper objects
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
    public function findOneBySomeField($value): ?UsuariosAfiliadosSuper
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
