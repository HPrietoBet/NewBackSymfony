<?php

namespace App\Repository\Main;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasUsuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CampaniasUsuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampaniasUsuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampaniasUsuario[]    findAll()
 * @method CampaniasUsuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaniasUsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CampaniasUsuario::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CampaniasUsuario $entity, bool $flush = true): void
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
    public function remove(CampaniasUsuario $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CampaniasUsuario[] Returns an array of CampaniasUsuario objects
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
    public function findOneBySomeField($value): ?CampaniasUsuario
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findByUserWithCampaign($idUser){
        return $this->createQueryBuilder('cu')->select('c.titcamp, cu.idCampaniaUsuario, cu.activo')->join(Campanias::class, 'c', 'with', 'c.id = cu.idCampania')->where('cu.idUsuario = :userId')->setParameter('userId', $idUser)->getQuery()->getResult();
    }
}
