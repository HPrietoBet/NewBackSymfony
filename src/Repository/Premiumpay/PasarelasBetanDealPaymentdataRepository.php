<?php

namespace App\Repository\Premiumpay;

use App\Entity\Premiumpay\PasarelaBetandealPaymentdata;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PasarelaBetandealPaymentdata|null find($id, $lockMode = null, $lockVersion = null)
 * @method PasarelaBetandealPaymentdata|null findOneBy(array $criteria, array $orderBy = null)
 * @method PasarelaBetandealPaymentdata[]    findAll()
 * @method PasarelaBetandealPaymentdata[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PasarelasBetanDealPaymentdataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PasarelaBetandealPaymentdata::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PasarelaBetandealPaymentdata $entity, bool $flush = true): void
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
    public function remove(PasarelaBetandealPaymentdata $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PasarelaBetandealPaymentdata[] Returns an array of PasarelaBetandealPaymentdata objects
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
    public function findOneBySomeField($value): ?PasarelaBetandealPaymentdata
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getChartInfo($chartDates, $currency = 'EUR', $visible = true){
        $currencies = $currency=='EUR' ? array('EUR', '€'): array($currency);
        $visible = empty($visible)? 0: 1;
        $datos =   $this->createQueryBuilder('pd')->select(['pd.datepayment fecha', 'SUM(pd.quantity) ventas', 'count(pd.idtransaccion) transacciones'])
                ->where('pd.datepayment BETWEEN :from AND :to')
                ->andWhere('pd.currency IN (:currency)')
                ->andWhere('pd.visible = :visible')
                ->setParameter('from', $chartDates['init'])
                ->setParameter('to',$chartDates['end'])
                ->setParameter('currency', $currencies)
                ->setParameter('visible', $visible)
                ->groupBy('pd.datepayment')
                ->getQuery()
                ->getResult() ?? 0;
        return $datos;

    }
}
