<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasDeApuestasPais
 *
 * @ORM\Table(name="casas_de_apuestas_pais")
 * @ORM\Entity(repositoryClass="App\Repository\Main\CasasDeApuestasPaisRepository")
 */
class CasasDeApuestasPais
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cas_pais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCasPais;

    /**
     * @var string
     *
     * @ORM\Column(name="titpais", type="string", length=256, nullable=false)
     */
    private $titpais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titpais_en", type="string", length=255, nullable=true)
     */
    private $titpaisEn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titpais_pt", type="string", length=255, nullable=true)
     */
    private $titpaisPt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titpais_it", type="string", length=255, nullable=true)
     */
    private $titpaisIt;

    /**
     * @var string
     *
     * @ORM\Column(name="titcorto", type="string", length=2, nullable=false)
     */
    private $titcorto;

    /**
     * @var bool
     *
     * @ORM\Column(name="actcaspais", type="boolean", nullable=false)
     */
    private $actcaspais;

    public function getIdCasPais(): ?int
    {
        return $this->idCasPais;
    }

    public function getTitpais(): ?string
    {
        return $this->titpais;
    }

    public function setTitpais(string $titpais): self
    {
        $this->titpais = $titpais;

        return $this;
    }

    public function getTitpaisEn(): ?string
    {
        return $this->titpaisEn;
    }

    public function setTitpaisEn(?string $titpaisEn): self
    {
        $this->titpaisEn = $titpaisEn;

        return $this;
    }

    public function getTitpaisPt(): ?string
    {
        return $this->titpaisPt;
    }

    public function setTitpaisPt(?string $titpaisPt): self
    {
        $this->titpaisPt = $titpaisPt;

        return $this;
    }

    public function getTitpaisIt(): ?string
    {
        return $this->titpaisIt;
    }

    public function setTitpaisIt(?string $titpaisIt): self
    {
        $this->titpaisIt = $titpaisIt;

        return $this;
    }

    public function getTitcorto(): ?string
    {
        return $this->titcorto;
    }

    public function setTitcorto(string $titcorto): self
    {
        $this->titcorto = $titcorto;

        return $this;
    }

    public function getActcaspais(): ?bool
    {
        return $this->actcaspais;
    }

    public function setActcaspais(bool $actcaspais): self
    {
        $this->actcaspais = $actcaspais;

        return $this;
    }


}
