<?php

namespace App\Entity\Old;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasAcuerdosOld
 *
 * @ORM\Table(name="casas_acuerdos_old")
 * @ORM\Entity(repositoryClass="App\Repository\Old\CasasAcuerdosOldRepository")
 */
class CasasAcuerdosOld
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
     * @ORM\Column(name="cpa", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cpa;

    /**
     * @var string
     *
     * @ORM\Column(name="cpa_moneda", type="string", length=10, nullable=false)
     */
    private $cpaMoneda;

    /**
     * @var string
     *
     * @ORM\Column(name="rs", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $rs;

    /**
     * @var string
     *
     * @ORM\Column(name="fee", type="decimal", precision=10, scale=2, nullable=false)
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

    public function getCpa(): ?string
    {
        return $this->cpa;
    }

    public function setCpa(string $cpa): self
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

    public function getRs(): ?string
    {
        return $this->rs;
    }

    public function setRs(string $rs): self
    {
        $this->rs = $rs;

        return $this;
    }

    public function getFee(): ?string
    {
        return $this->fee;
    }

    public function setFee(string $fee): self
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
