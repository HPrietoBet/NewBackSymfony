<?php

namespace App\Repository\Main;

use App\Entity\Main\CasasCompetidores;
use App\Entity\Main\CasasCompetidoresComentarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CasasCompetidores|null find($id, $lockMode = null, $lockVersion = null)
 * @method CasasCompetidores|null findOneBy(array $criteria, array $orderBy = null)
 * @method CasasCompetidores[]    findAll()
 * @method CasasCompetidores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasasComptenidoresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CasasCompetidores::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CasasCompetidores $entity, bool $flush = true): void
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
    public function remove(CasasCompetidores $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CasasCompetidores[] Returns an array of CasasCompetidores objects
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
    public function findOneBySomeField($value): ?CasasCompetidores
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllWithComments()
    {
        return $this->createQueryBuilder('c')
            ->select(
                'c.id,
                c.nombre,
                c.logo,
                c.paises,
                c.esGlobal,
                c.activo,
                cc.id as idComentario,
                cc.fecha,
                cc.usuario,
                cc.comentario'
            )
            ->leftJoin(CasasCompetidoresComentarios::class, 'cc', 'WITH', 'c.id = cc.idCasa')
            ->getQuery()
            ->getArrayResult();

    }
}
