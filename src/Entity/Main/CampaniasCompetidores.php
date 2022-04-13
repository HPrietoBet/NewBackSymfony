<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasCompetidores
 *
 * @ORM\Table(name="campanias_competidores")
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasCompetidoresRepository")
 */
class CampaniasCompetidores
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="casa_betandeal", type="integer", nullable=true)
     */
    private $casaBetandeal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="campania_betandeal", type="integer", nullable=true)
     */
    private $campaniaBetandeal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="casa_competidora", type="integer", nullable=true)
     */
    private $casaCompetidora;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cpa", type="integer", nullable=true)
     */
    private $cpa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cpa_moneda", type="string", length=10, nullable=true)
     */
    private $cpaMoneda;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rs", type="integer", nullable=true)
     */
    private $rs;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fee", type="integer", nullable=true)
     */
    private $fee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fee_moneda", type="string", length=10, nullable=true)
     */
    private $feeMoneda;

    /**
     * @var string|null
     *
     * @ORM\Column(name="baseline", type="string", length=255, nullable=true)
     */
    private $baseline;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCasaBetandeal(): ?int
    {
        return $this->casaBetandeal;
    }

    public function setCasaBetandeal(?int $casaBetandeal): self
    {
        $this->casaBetandeal = $casaBetandeal;

        return $this;
    }

    public function getCampaniaBetandeal(): ?int
    {
        return $this->campaniaBetandeal;
    }

    public function setCampaniaBetandeal(?int $campaniaBetandeal): self
    {
        $this->campaniaBetandeal = $campaniaBetandeal;

        return $this;
    }

    public function getCasaCompetidora(): ?int
    {
        return $this->casaCompetidora;
    }

    public function setCasaCompetidora(?int $casaCompetidora): self
    {
        $this->casaCompetidora = $casaCompetidora;

        return $this;
    }

    public function getCpa(): ?int
    {
        return $this->cpa;
    }

    public function setCpa(?int $cpa): self
    {
        $this->cpa = $cpa;

        return $this;
    }

    public function getCpaMoneda(): ?string
    {
        return $this->cpaMoneda;
    }

    public function setCpaMoneda(?string $cpaMoneda): self
    {
        $this->cpaMoneda = $cpaMoneda;

        return $this;
    }

    public function getRs(): ?int
    {
        return $this->rs;
    }

    public function setRs(?int $rs): self
    {
        $this->rs = $rs;

        return $this;
    }

    public function getFee(): ?int
    {
        return $this->fee;
    }

    public function setFee(?int $fee): self
    {
        $this->fee = $fee;

        return $this;
    }

    public function getFeeMoneda(): ?string
    {
        return $this->feeMoneda;
    }

    public function setFeeMoneda(?string $feeMoneda): self
    {
        $this->feeMoneda = $feeMoneda;

        return $this;
    }

    public function getBaseline(): ?string
    {
        return $this->baseline;
    }

    public function setBaseline(?string $baseline): self
    {
        $this->baseline = $baseline;

        return $this;
    }


}
