<?php

namespace App\Repository\Main;

use App\Entity\Main\Campanias;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Campanias|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campanias|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campanias[]    findAll()
 * @method Campanias[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaniasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Campanias::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Campanias $entity, bool $flush = true): void
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
    public function remove(Campanias $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Campanias[] Returns an array of Campanias objects
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
    public function findOneBySomeField($value): ?Campanias
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    // agotadas
    public function campanias_codigos_agotados($numCodes){
        $campanias_codes = $this->createQueryBuilder('c')
            ->select('c.id, c.titcamp, count(cc.id) totales')
            ->leftJoin('App\Entity\Main\CampaniasCodes', 'cc', 'WITH', 'c.id = cc.idcampania')
            ->where('c.tipo = :manual')
            ->andWhere('c.actcamp = :activa')
            ->setParameters(['manual'=>'manual', 'activa'=>1])
            ->groupBy('c.id')
            ->getQuery()->getArrayResult();

        $campanias_codes_usados = $this->createQueryBuilder('c')
            ->select('c.id, c.titcamp, count(cc.id) usados')
            ->leftJoin('App\Entity\Main\CampaniasCodes', 'cc', 'WITH', 'c.id = cc.idcampania')
            ->where('c.tipo = :manual')
            ->andWhere('c.actcamp = :activa')
            ->andWhere('cc.activo = :activos')
            ->setParameters(['manual'=>'manual', 'activa'=>1, 'activos' => 1])
            ->groupBy('c.id')
            ->getQuery()->getArrayResult();

        $codigos_agotados = array();
        foreach($campanias_codes as $campania){
            $codigos_campanias[$campania['id']] = $campania;
        }
        foreach($campanias_codes_usados as $campania){
            $codigos_campanias_usados_contador[$campania['id']] = $campania;
        }
        foreach($codigos_campanias as $campania){

                $codigos_campanias[$campania['id']]['usados'] = $codigos_campanias_usados_contador[$campania['id']]['usados'] ?? 0;
                $codigos_campanias[$campania['id']]['restantes'] =$codigos_campanias[$campania['id']]['totales'] - $codigos_campanias[$campania['id']]['usados'];
                if($codigos_campanias[$campania['id']]['restantes'] < $numCodes){
                    $codigos_agotados[] = $codigos_campanias[$campania['id']];
                }
        }
        return $codigos_agotados;
    }


}
