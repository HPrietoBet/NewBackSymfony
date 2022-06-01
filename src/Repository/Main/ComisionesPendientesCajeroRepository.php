<?php

namespace App\Repository\Main;

use App\Entity\Main\ComisionesPendientesCajero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method ComisionesPendientesCajero|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComisionesPendientesCajero|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComisionesPendientesCajero[]    findAll()
 * @method ComisionesPendientesCajero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComisionesPendientesCajeroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComisionesPendientesCajero::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ComisionesPendientesCajero $entity, bool $flush = true): void
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
    public function remove(ComisionesPendientesCajero $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ComisionesPendientesCajero[] Returns an array of ComisionesPendientesCajero objects
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
    public function findOneBySomeField($value): ?ComisionesPendientesCajero
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function getTotalCommisions(){

        $conn = $this->_em->getConnection();
        $sql = 'SELECT id_usuario ,sum(importe) total, (select sum(importe) from comisiones_pendientes_cajero cpc2  where cpc2.id_usuario  = cpc.id_usuario and tipo_movimiento  =1 ) generadas, (select sum(importe) from comisiones_pendientes_cajero cpc2  where cpc2.id_usuario  = cpc.id_usuario and tipo_movimiento  !=1 )*-1 pagadas from comisiones_pendientes_cajero cpc group by id_usuario';
        $stmt = $conn->prepare($sql);
        return $stmt->execute()->fetchAll();

    }
}
