<?php

namespace App\Repository\Main;

use App\Entity\Main\LoginAdmin;
use App\Entity\Main\LoginBusiness;
use App\Entity\Main\UsuariosAceptarterminos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuariosAceptarterminos|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuariosAceptarterminos|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuariosAceptarterminos[]    findAll()
 * @method UsuariosAceptarterminos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosTerminosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuariosAceptarterminos::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsuariosAceptarterminos $entity, bool $flush = true): void
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
    public function remove(UsuariosAceptarterminos $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UsuariosAceptarterminos[] Returns an array of UsuariosAceptarterminos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsuariosAceptarterminos
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
*/
    public function getUsersTerms()
    {
        return $this->createQueryBuilder('ua')
            ->select('ua.id, lb.username, ua.fecha, ua.aceptaTerminos, ua.aceptaPolitica, la.user')
            ->join(LoginBusiness::class, 'lb', 'WITH', 'lb.id = ua.idUsuario')
            ->leftJoin(LoginAdmin::class, 'la', 'WITH', 'la.id = lb.responsable')
            ->getQuery()
            ->getArrayResult()
        ;
    }

}
