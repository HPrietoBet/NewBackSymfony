<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAfiliadosVisitas
 *
 * @ORM\Table(name="usuarios_afiliados_visitas")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosAfiliadosVisitasRepository")
 */
class UsuariosAfiliadosVisitas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ip", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIp;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user_afiliado", type="integer", nullable=false)
     */
    private $idUserAfiliado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ip", type="date", nullable=false)
     */
    private $fechaIp;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_ultima_visita", type="datetime", nullable=true)
     */
    private $fechaUltimaVisita;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=60, nullable=false)
     */
    private $ip;

    /**
     * @var int
     *
     * @ORM\Column(name="visitas", type="integer", nullable=false)
     */
    private $visitas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="device", type="string", length=5, nullable=true)
     */
    private $device;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_camp_bid", type="integer", nullable=true)
     */
    private $idCampBid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_sport", type="integer", nullable=true)
     */
    private $idSport;

    public function getIdIp(): ?int
    {
        return $this->idIp;
    }

    public function getIdUserAfiliado(): ?int
    {
        return $this->idUserAfiliado;
    }

    public function setIdUserAfiliado(int $idUserAfiliado): self
    {
        $this->idUserAfiliado = $idUserAfiliado;

        return $this;
    }

    public function getFechaIp(): ?\DateTimeInterface
    {
        return $this->fechaIp;
    }

    public function setFechaIp(\DateTimeInterface $fechaIp): self
    {
        $this->fechaIp = $fechaIp;

        return $this;
    }

    public function getFechaUltimaVisita(): ?\DateTimeInterface
    {
        return $this->fechaUltimaVisita;
    }

    public function setFechaUltimaVisita(?\DateTimeInterface $fechaUltimaVisita): self
    {
        $this->fechaUltimaVisita = $fechaUltimaVisita;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getVisitas(): ?int
    {
        return $this->visitas;
    }

    public function setVisitas(int $visitas): self
    {
        $this->visitas = $visitas;

        return $this;
    }

    public function getDevice(): ?string
    {
        return $this->device;
    }

    public function setDevice(?string $device): self
    {
        $this->device = $device;

        return $this;
    }

    public function getIdCampBid(): ?int
    {
        return $this->idCampBid;
    }

    public function setIdCampBid(?int $idCampBid): self
    {
        $this->idCampBid = $idCampBid;

        return $this;
    }

    public function getIdSport(): ?int
    {
        return $this->idSport;
    }

    public function setIdSport(?int $idSport): self
    {
        $this->idSport = $idSport;

        return $this;
    }


}
