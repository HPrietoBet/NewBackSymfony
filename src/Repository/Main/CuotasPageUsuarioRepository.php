<?php

namespace App\Repository\Main;

use App\Entity\Main\CuotasPageUsuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CuotasPageUsuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuotasPageUsuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuotasPageUsuario[]    findAll()
 * @method CuotasPageUsuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuotasPageUsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CuotasPageUsuario::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CuotasPageUsuario $entity, bool $flush = true): void
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
    public function remove(CuotasPageUsuario $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CuotasPageUsuario[] Returns an array of CuotasPageUsuario objects
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
    public function findOneBySomeField($value): ?CuotasPageUsuario
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
