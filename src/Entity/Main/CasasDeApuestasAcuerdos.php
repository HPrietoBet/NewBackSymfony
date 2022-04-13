<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasDeApuestasAcuerdos
 *
 * @ORM\Table(name="casas_de_apuestas_acuerdos", indexes={@ORM\Index(name="ix_id_casa", columns={"id_casa"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CasasDeApuestasAcuerdosRepository")
 */
class CasasDeApuestasAcuerdos
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
     * @var int
     *
     * @ORM\Column(name="cpa", type="integer", nullable=false)
     */
    private $cpa;

    /**
     * @var string
     *
     * @ORM\Column(name="cpa_moneda", type="string", length=10, nullable=false)
     */
    private $cpaMoneda;

    /**
     * @var int
     *
     * @ORM\Column(name="rs", type="integer", nullable=false)
     */
    private $rs;

    /**
     * @var int
     *
     * @ORM\Column(name="fee", type="integer", nullable=false)
     */
    private $fee;

    /**
     * @var string
     *
     * @ORM\Column(name="fee_moneda", type="string", length=10, nullable=false)
     */
    private $feeMoneda;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="acuerdo_activo", type="boolean", nullable=true, options={"default"="1"})
     */
    private $acuerdoActivo = true;

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

    public function getCpa(): ?int
    {
        return $this->cpa;
    }

    public function setCpa(int $cpa): self
    {
        $this->cpa = $cpa;

        return $this;
    }

    public function getCpaMoneda(): ?string
    {
        return $this->cpaMoneda;
    }

    public function setCpaMoneda(string $cpaMoneda): self
    {
        $this->cpaMoneda = $cpaMoneda;

        return $this;
    }

    public function getRs(): ?int
    {
        return $this->rs;
    }

    public function setRs(int $rs): self
    {
        $this->rs = $rs;

        return $this;
    }

    public function getFee(): ?int
    {
        return $this->fee;
    }

    public function setFee(int $fee): self
    {
        $this->fee = $fee;

        return $this;
    }

    public function getFeeMoneda(): ?string
    {
        return $this->feeMoneda;
    }

    public function setFeeMoneda(string $feeMoneda): self
    {
        $this->feeMoneda = $feeMoneda;

        return $this;
    }

    public function getAcuerdoActivo(): ?bool
    {
        return $this->acuerdoActivo;
    }

    public function setAcuerdoActivo(?bool $acuerdoActivo): self
    {
        $this->acuerdoActivo = $acuerdoActivo;

        return $this;
    }


}
