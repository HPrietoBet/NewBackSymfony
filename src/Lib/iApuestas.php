<?php
namespace App\Lib;

use App\Entity\Main\Campanias;
use App\Entity\Main\CampaniasEnlace;
use App\Entity\Main\CampaniasUsuario;
use App\Entity\Main\CampaniasCodes;
use App\Entity\Main\LoginBusiness;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class iApuestas
{
    const PENDIENTE_CAMPANIAS_IAPUESTAS = 2;
    public $em;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->em = $doctrine;
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    public function prepareIApuestas($idUsuario, $active){
        $campaigns = $this->getCampaniasIapuestas($idUsuario);

        if(!empty($campaigns) && empty($active)){
            $this->disableCampaigns($campaigns );
        }
        if(!empty($campaigns) && !empty($active)){
            $this->enableCampaigns($campaigns);
        }
        if(empty($campaigns) && !empty($active)){
            $this->getCampaniasIapuestasAndCreateForUser($idUsuario);
        }


    }

    public function getCampaniasIapuestas($idUsuario){

        $campaniasIapuestas = $this->em->getRepository(CampaniasUsuario::class)->findBy(
            [
                'idUsuario' => $idUsuario,
                'pendiente' => self::PENDIENTE_CAMPANIAS_IAPUESTAS
            ]
        );
        return $campaniasIapuestas;

    }

    private function disableCampaigns($campanias){
        foreach($campanias as $campaniaUsuarioObj){
            $campaniaUsuarioObj->setActivo(0);
            $this->em->getManager()->persist($campaniaUsuarioObj);
            $this->em->getManager()->flush();
        }

    }

    private function enableCampaigns($campanias){
        foreach($campanias as $campaniaUsuarioObj){
            $campaniaUsuarioObj->setActivo(true);
            $this->em->getManager()->persist($campaniaUsuarioObj);
            $this->em->getManager()->flush();
        }

    }

    private function getCampaniasIapuestasAndCreateForUser($idUsuario){

        $ServiceEntityRepository = new ServiceEntityRepository($this->em, Campanias::class);
        $campaigns_to_create = $ServiceEntityRepository->createQueryBuilder('c')
                                ->select('c.id, c.comisioncamp,c.condiciones, ce.urlInicial ')
                                ->join(CampaniasEnlace::class, 'ce', 'WITH', 'c.id = ce.idCampania')
                                ->where('c.casaIapuestas > :zero')
                                ->andWhere('c.actcamp = :activo')
                                ->setParameter('zero', 0)
                                ->setParameter('activo', 1)
                                ->groupBy('c.id')
                                ->getQuery()
                                ->getArrayResult();

        foreach($campaigns_to_create as $camp){
            $now = date('Y-m-d H:i:s');
            $campaniasUsuarioObj = new CampaniasUsuario();
            $campaniasUsuarioObj->setFechaAlta($now);
            $campaniasUsuarioObj->setIdCampania($camp['id']);
            $campaniasUsuarioObj->setIdUsuario($idUsuario);
            $campaniasUsuarioObj->setComision($camp['comisioncamp']);
            $campaniasUsuarioObj->setCondiciones($camp['condiciones']);
            $campaniasUsuarioObj->setUrlInicial($camp['urlInicial']);
            $campaniasUsuarioObj->setClicksTotales(0);
            $campaniasUsuarioObj->setActivo(1);
            $campaniasUsuarioObj->setEsPrivada(0);
            $campaniasUsuarioObj->setSolicitada(1);
            $campaniasUsuarioObj->setPendiente(2);
            $campaniasUsuarioObj->setCondicionesMejoradas(0);

            $this->em->getManager()->persist($campaniasUsuarioObj);
            $this->em->getManager()->flush();

        }
        $this->CreateAutomaticCodes($idUsuario);
    }

    private function CreateAutomaticCodes($idusuario){


        $ServiceEntityRepository = new ServiceEntityRepository($this->em, CampaniasUsuario::class);
        $codesToCreate = $ServiceEntityRepository->createQueryBuilder('cu')
                                ->select('c.idCasa , c.id, cu.idCampaniaUsuario, lb.username')
                                ->join(Campanias::class, 'c', 'WITH', 'c.id = cu.idCampania')
                                ->join(LoginBusiness::class, 'lb', 'WITH', 'lb.id = cu.idUsuario')
                                ->where('cu.pendiente = :pending')
                                ->andWhere('c.tipo = :tipo')
                                ->andWhere('cu.idUsuario = :idusuario')
                                ->setParameter('pending', 2)
                                ->setParameter('tipo', 'auto')
                                ->setParameter('idusuario', $idusuario)
                                ->getQuery()
                                ->getArrayResult();

        foreach($codesToCreate as $code){
            $campaniaCodeObj = new CampaniasCodes();
            $campaniaCodeObj->setIdcasa($code['idCasa']);
            $campaniaCodeObj->setIdcampania($code['id']);
            $campaniaCodeObj->setCodigo('I'.$code['idCampaniaUsuario']);
            $campaniaCodeObj->setIdUsuario($code['idCampaniaUsuario']);
            $campaniaCodeObj->setUsername($code['username']);
            $campaniaCodeObj->setActivo(1);
            $campaniaCodeObj->setProject(1);

            $this->em->getManager()->persist($campaniaCodeObj);
            $this->em->getManager()->flush();
        }

    }
}