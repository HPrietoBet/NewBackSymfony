<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasAcuerdosIapuestas
 *
 * @ORM\Table(name="casas_acuerdos_iapuestas", indexes={@ORM\Index(name="ix_id_casa", columns={"id_casa"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CasasAcuerdosIapuestasRepository")
 */
class CasasAcuerdosIapuestas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_casa", type="integer", nullable=false)
     */
    private $idCasa;

    /**
     * @var string
     *
     * @ORM\Column(name="fijo", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $fijo;

    /**
     * @var string
     *
     * @ORM\Column(name="moneda", type="string", length=10, nullable=false)
     */
    private $moneda;

    /**
     * @var int
     *
     * @ORM\Column(name="version", type="integer", nullable=false)
     */
    private $version;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_acuerdo", type="integer", nullable=false)
     */
    private $numeroAcuerdo;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer", nullable=false)
     */
    private $activo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCasa(): ?int
    {
        return $this->idCasa;
    }

    public function setIdCasa(int $idCasa): self
    {
        $this->idCasa = $idCasa;

        return $this;
    }

    public function getFijo(): ?string
    {
        return $this->fijo;
    }

    public function setFijo(string $fijo): self
    {
        $this->fijo = $fijo;

        return $this;
    }

    public function getMoneda(): ?string
    {
        return $this->moneda;
    }

    public function setMoneda(string $moneda): self
    {
        $this->moneda = $moneda;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getNumeroAcuerdo(): ?int
    {
        return $this->numeroAcuerdo;
    }

    public function setNumeroAcuerdo(int $numeroAcuerdo): self
    {
        $this->numeroAcuerdo = $numeroAcuerdo;

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
