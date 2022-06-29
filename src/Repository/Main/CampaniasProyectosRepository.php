<?php

namespace App\Repository\Main;

use App\Entity\Main\CampaniasProyectos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CampaniasProyectos|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampaniasProyectos|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampaniasProyectos[]    findAll()
 * @method CampaniasProyectos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaniasProyectosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CampaniasProyectos::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CampaniasProyectos $entity, bool $flush = true): void
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
    public function remove(CampaniasProyectos $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
