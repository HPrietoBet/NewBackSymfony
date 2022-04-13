<?php

namespace App\Repository\Main;

use App\Entity\Main\PaginasHtmlCasasapuestas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PaginasHtmlCasasapuestas|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaginasHtmlCasasapuestas|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaginasHtmlCasasapuestas[]    findAll()
 * @method PaginasHtmlCasasapuestas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaginasHTMLCasasDeApuestasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaginasHtmlCasasapuestas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PaginasHtmlCasasapuestas $entity, bool $flush = true): void
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
    public function remove(PaginasHtmlCasasapuestas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PaginasHtmlCasasapuestas[] Returns an array of PaginasHtmlCasasapuestas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaginasHtmlCasasapuestas
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
