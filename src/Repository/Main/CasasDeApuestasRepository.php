<?php

namespace App\Repository\Main;

use App\Entity\Main\CasasDeApuestas;
use App\Entity\Main\CasasDeApuestasAcuerdos;
use App\Entity\Main\CasasDeApuestasComentarios;
use App\Entity\Main\CategoriasCampania;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CasasDeApuestas|null find($id, $lockMode = null, $lockVersion = null)
 * @method CasasDeApuestas|null findOneBy(array $criteria, array $orderBy = null)
 * @method CasasDeApuestas[]    findAll()
 * @method CasasDeApuestas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasasDeApuestasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CasasDeApuestas::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CasasDeApuestas $entity, bool $flush = true): void
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
    public function remove(CasasDeApuestas $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CasasDeApuestas[] Returns an array of CasasDeApuestas objects
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
    public function findOneBySomeField($value): ?CasasDeApuestas
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getAllAboutClient(){
        return $this->createQueryBuilder('c')
                ->select('c.activoFeedCuotas,
                    c.activoFeedStreaming,
                    c.baseline,
                    c.bono,
                    c.contacto,
                    c.currency,
                    c.datosFacturacion,
                    c.feedCuotas,
                    c.feedStreaming,
                    c.idCasPais,
                    c.idCasa,
                    c.idCat,
                    c.idPaginaHtml,
                    c.imgcasa,
                    c.impuestos,
                    c.logoCustom,
                    c.actcasa,
                    c.metodoCobro,
                    c.paisOrder,
                    c.password,
                    c.procedimientoPago,
                    c.requiereFactura,
                    c.responsable,
                    c.titcasa,
                    c.url,
                    c.usuario,
                    cda.cpa,
                    cda.cpaMoneda,
                    cda.rs,
                    cda.fee,
                    cda.feeMoneda,
                    cda.acuerdoActivo,
                    cc.titcat,
                    cc.actcat')
                ->join(CasasDeApuestasAcuerdos::class,'cda', 'WITH', 'c.idCasa = cda.idCasa')
                ->join(CategoriasCampania::class, 'cc' , 'WITH','cc.idCat = c.idCat')
                ->getQuery()
                ->getArrayResult();
    }
}
