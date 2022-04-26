<?php

namespace App\Repository\Main;

use App\Entity\Main\UsuariosAfiliadosPagos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuariosAfiliadosPagos|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuariosAfiliadosPagos|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuariosAfiliadosPagos[]    findAll()
 * @method UsuariosAfiliadosPagos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosAfiliadosPagosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuariosAfiliadosPagos::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsuariosAfiliadosPagos $entity, bool $flush = true): void
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
    public function remove(UsuariosAfiliadosPagos $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UsuariosAfiliadosPagos[] Returns an array of UsuariosAfiliadosPagos objects
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
    public function findOneBySomeField($value): ?UsuariosAfiliadosPagos
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function countAll(){
        return  $this->createQueryBuilder('uap')->select('SUM(uap.jugadores)')->getQuery()->getSingleScalarResult() ?? 0;
    }

    public function getSumMoney(){
        return  $this->createQueryBuilder('uap')->select('SUM(uap.importePago)')->getQuery()->getSingleScalarResult() ?? 0;
    }
}
