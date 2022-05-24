<?php

namespace App\Repository\Main;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasUsuario;
use App\Entity\Main\EstadisticasApi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EstadisticasApi|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadisticasApi|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadisticasApi[]    findAll()
 * @method EstadisticasApi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadisticasAPIRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstadisticasApi::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EstadisticasApi $entity, bool $flush = true): void
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
    public function remove(EstadisticasApi $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EstadisticasApi[] Returns an array of EstadisticasApi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EstadisticasApi
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function countAll(){
        return  $this->createQueryBuilder('st')->select('sum(st.cpaGenerados)')->getQuery()->getSingleScalarResult();
    }

    public function getSumMoney(){
        return  $this->createQueryBuilder('st')->select('SUM(st.comisionGenerada)')->getQuery()->getSingleScalarResult() ?? 0;
    }

    public function getChartInfo($chartDates){
        $datos =   $this->createQueryBuilder('st')->select(['st.fecha fecha', 'SUM(st.comisionGenerada) comisiones', 'sum(st.cpaGenerados) jugadores'])
                ->where('st.fecha BETWEEN :from AND :to')
                ->setParameter('from', $chartDates['init'])
                ->setParameter('to',$chartDates['end'])
                ->groupBy('st.fecha')
                ->getQuery()
                ->getResult() ?? 0;
        return $datos;

    }

    public function getDataUser($userId, $dates){
        $datos =   $this->createQueryBuilder('st')->select(['SUM(st.comisionGenerada) comisiones', 'sum(st.cpaGenerados) cpas', 'sum(st.registros) registros', 'sum(st.depositantesPrimeraVez) depositantes'])
                ->leftJoin(CampaniasUsuario::class, 'cu', 'WITH', 'cu.idCampaniaUsuario = st.idCampaniaUsuario')
                ->where('st.fecha BETWEEN :from AND :to')
                ->andWhere('cu.idUsuario = :userid')
                ->setParameter('from', $dates[0]. ' 00:00:00')
                ->setParameter('to',$dates[1]. ' 23:59:59')
                ->setParameter('userid', $userId)
                ->getQuery()
                ->getOneOrNullResult() ?? 0;
        return $datos;

    }

    public function getDataClient($clientId, $dates){
        $datos =   $this->createQueryBuilder('st')->select(['SUM(st.comisionGenerada) comisiones', 'sum(st.cpaGenerados) cpas', 'sum(st.registros) registros', 'sum(st.depositantesPrimeraVez) depositantes'])
                ->leftJoin(CampaniasUsuario::class, 'cu', 'WITH', 'cu.idCampaniaUsuario = st.idCampaniaUsuario')
                ->leftJoin(Campanias::class, 'c', 'WITH', 'c.id = cu.idCampania')
                ->where('st.fecha BETWEEN :from AND :to')
                ->andWhere('c.idCasa = :clientid')
                ->setParameter('from', $dates[0]. ' 00:00:00')
                ->setParameter('to',$dates[1]. ' 23:59:59')
                ->setParameter('clientid', $clientId)
                ->getQuery()
                ->getOneOrNullResult() ?? 0;
        return $datos;

    }

    public function getDataCountry($iso, $dates){
        if(strlen($iso) > 2) {
            $datos = $this->createQueryBuilder('st')->select(['SUM(st.comisionGenerada) comisiones', 'sum(st.cpaGenerados) cpas', 'sum(st.registros) registros', 'sum(st.depositantesPrimeraVez) depositantes'])
                    ->leftJoin(CampaniasUsuario::class, 'cu', 'WITH', 'cu.idCampaniaUsuario = st.idCampaniaUsuario')
                    ->leftJoin(Campanias::class, 'c', 'WITH', 'c.id = cu.idCampania')
                    ->where('st.fecha BETWEEN :from AND :to')
                    ->andWhere('LENGTH(c.paises) > :chars')
                    ->setParameter('from', $dates[0] . ' 00:00:00')
                    ->setParameter('to', $dates[1] . ' 23:59:59')
                    ->setParameter('chars', 6)
                    ->getQuery()
                    ->getOneOrNullResult() ?? 0;
        }else{
            $datos = $this->createQueryBuilder('st')->select(['SUM(st.comisionGenerada) comisiones', 'sum(st.cpaGenerados) cpas', 'sum(st.registros) registros', 'sum(st.depositantesPrimeraVez) depositantes'])
                    ->leftJoin(CampaniasUsuario::class, 'cu', 'WITH', 'cu.idCampaniaUsuario = st.idCampaniaUsuario')
                    ->leftJoin(Campanias::class, 'c', 'WITH', 'c.id = cu.idCampania')
                    ->where('st.fecha BETWEEN :from AND :to')
                    ->andWhere('LENGTH(c.paises) <= :chars')
                    ->andWhere('c.paises like :iso')
                    ->setParameter('from', $dates[0] . ' 00:00:00')
                    ->setParameter('to', $dates[1] . ' 23:59:59')
                    ->setParameter('chars', 6)
                    ->setParameter('iso', "%".$iso."%")
                    ->getQuery()
                    ->getOneOrNullResult() ?? 0;
        }
        return $datos;

    }
}
