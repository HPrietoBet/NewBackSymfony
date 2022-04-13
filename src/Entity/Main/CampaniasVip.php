<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasVip
 *
 * @ORM\Table(name="campanias_vip", indexes={@ORM\Index(name="ix_id_usuario", columns={"id_usuario"}), @ORM\Index(name="id_campania", columns={"id_campania"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasVipRepository")
 */
class CampaniasVip
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_vip", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVip;

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var int
     *
     * @ORM\Column(name="id_campania", type="integer", nullable=false)
     */
    private $idCampania;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones_vip", type="string", length=255, nullable=false)
     */
    private $condicionesVip;

    /**
     * @var float
     *
     * @ORM\Column(name="comision", type="float", precision=10, scale=2, nullable=false)
     */
    private $comision;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer", nullable=false, options={"default"="1"})
     */
    private $activo = 1;

    public function getIdVip(): ?int
    {
        return $this->idVip;
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdCampania(): ?int
    {
        return $this->idCampania;
    }

    public function setIdCampania(int $idCampania): self
    {
        $this->idCampania = $idCampania;

        return $this;
    }

    public function getCondicionesVip(): ?string
    {
        return $this->condicionesVip;
    }

    public function setCondicionesVip(string $condicionesVip): self
    {
        $this->condicionesVip = $condicionesVip;

        return $this;
    }

    public function getComision(): ?float
    {
        return $this->comision;
    }

    public function setComision(float $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    public function getActivo(): ?int
    {
        return $this->activo;
    }

    public function setActivo(int $activo): self
    {
        $this->activo = $activo;

        return $this;
    }


}
