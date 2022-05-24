<?php

namespace App\Repository\Main;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasCodes;
use App\Entity\Main\CampaniasUsuario;
use App\Entity\Main\CampaniasUsuarioClicks;
use App\Entity\Main\LoginBusiness;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CampaniasUsuarioClicks|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampaniasUsuarioClicks|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampaniasUsuarioClicks[]    findAll()
 * @method CampaniasUsuarioClicks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaniasUsuarioClickRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CampaniasUsuarioClicks::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CampaniasUsuarioClicks $entity, bool $flush = true): void
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
    public function remove(CampaniasUsuarioClicks $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CampaniasUsuarioClicks[] Returns an array of CampaniasUsuarioClicks objects
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
    public function findOneBySomeField($value): ?CampaniasUsuarioClicks
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findByUsingDates($idCampanias, $client, $dates)
    {

        $return = $this->createQueryBuilder('cuc')
                    ->select('cuc.fecha, cc.codigo, c.titcamp, cu.idUsuario, lb.username,  cu.idCampaniaUsuario, cuc.clicksTotalesCampaniaUsuario ctotales, cuc.clicksUnicosCampaniaUsuario cuniques')
                    ->leftJoin(CampaniasUsuario::class, 'cu', 'WITH', 'cu.idCampaniaUsuario = cuc.idCampania')
                    ->leftJoin(Campanias::class, 'c' , 'WITH', 'c.id = cu.idCampania')
                    ->leftJoin(CampaniasCodes::class, 'cc' , 'WITH', 'cc.idUsuario = cu.idCampaniaUsuario')
                    ->leftJoin(LoginBusiness::class, 'lb', 'WITH', 'lb.id = cu.idUsuario')
                    ->where('cuc.idCampania in (:idCampanias)')
                    ->andWhere('c.idCasa = :client')
                    ->andWhere('cuc.fecha >= :dateInit')
                    ->andWhere('cuc.fecha < :dateEnd')
                    ->setParameter('idCampanias', $idCampanias)
                    ->setParameter('client', $client)
                    ->setParameter('dateInit', $dates[0]. ' 00:00:00')
                    ->setParameter('dateEnd', $dates[1]. ' 23:59:59')
                    ->groupBy('cuc.idCampania, cuc.fecha')
                    ->getQuery()
                    ->getResult();

        $returned_array = array();
        $returned_end = array();
        if(!empty($return)) {
            foreach ($return as $item) {
                $date_to_key = explode(':', $item['fecha'])[0];

                if (empty($returned_array[$date_to_key][$item['idCampaniaUsuario']])) {
                    $returned_array[$date_to_key][$item['idCampaniaUsuario']] = array(
                        'fecha' => $date_to_key,
                        'titcamp' => $item['titcamp'],
                        'idUsuario' => $item['idUsuario'],
                        'username' => $item['username'],
                        'idCampaniaUsuario' => $item['idCampaniaUsuario'],
                        'codigo' => $item['codigo'],
                        'ctotales' => 0,
                        'cuniques' => 0,
                    );
                }
                    $returned_array[$date_to_key][$item['idCampaniaUsuario']]['ctotales'] += $item['ctotales'];
                    $returned_array[$date_to_key][$item['idCampaniaUsuario']]['cuniques'] += $item['cuniques'];
            }
        }
        foreach ($returned_array as $date => $value){
            foreach($value as $campania => $val){
                $returned_end[] = $val;
            }
        }
        return $returned_end;

        //return $returned_array;
    }
}
