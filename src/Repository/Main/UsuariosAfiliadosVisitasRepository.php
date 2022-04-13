<?php

namespace App\Repository\Main;

use App\Entity\Main\UsuariosAfiliadosVisitas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuariosAfiliadosVisitas|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuariosAfiliadosVisitas|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuariosAfiliadosVisitas[]    findAll()
 * @method UsuariosAfiliadosVisitas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosAfiliadosVisitasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuariosAfiliadosVisitas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsuariosAfiliadosVisitas $entity, bool $flush = true): void
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
    public function remove(UsuariosAfiliadosVisitas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UsuariosAfiliadosVisitas[] Returns an array of UsuariosAfiliadosVisitas objects
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
    public function findOneBySomeField($value): ?UsuariosAfiliadosVisitas
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
