<?php

namespace App\Repository\Main;

use App\Entity\Main\Facturacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Facturacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facturacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facturacion[]    findAll()
 * @method Facturacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacturacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facturacion::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Facturacion $entity, bool $flush = true): void
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
    public function remove(Facturacion $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Facturacion[] Returns an array of Facturacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Facturacion
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getFacturas(){

        $conn = $this->_em->getConnection();
        $sql = 'SELECT * FROM
                (SELECT *, pagado as estapagado FROM facturacion) s1
                INNER JOIN
                (SELECT * FROM facturacion_datos)s2
                ON s1.id_usu_fac = s2.id
                INNER JOIN 
                (SELECT * FROM login_business) s3
                ON s2.id_usu_fac = s3.id';
        $stmt = $conn->prepare($sql);
        return $stmt->execute()->fetchAll();

    }
}
