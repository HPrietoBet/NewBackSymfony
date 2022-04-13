<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * PasarelaBetandeal
 *
 * @ORM\Table(name="pasarela_betandeal", indexes={@ORM\Index(name="ix_idpasarela", columns={"idpasarela"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\PasarelasBetanDealRepository")
 */
class PasarelaBetandeal
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
     * @ORM\Column(name="idpasarela", type="string", length=45, nullable=false, options={"comment"="Id de usuario de betandeal"})
     */
    private $idpasarela;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true, options={"default"="1"})
     */
    private $activo = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailremitente", type="string", length=300, nullable=true)
     */
    private $emailremitente;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailrecibir", type="string", length=300, nullable=true)
     */
    private $emailrecibir;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_tipster", type="string", length=255, nullable=true)
     */
    private $nombreTipster;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdpasarela(): ?string
    {
        return $this->idpasarela;
    }

    public function setIdpasarela(string $idpasarela): self
    {
        $this->idpasarela = $idpasarela;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEmailremitente(): ?string
    {
        return $this->emailremitente;
    }

    public function setEmailremitente(?string $emailremitente): self
    {
        $this->emailremitente = $emailremitente;

        return $this;
    }

    public function getEmailrecibir(): ?string
    {
        return $this->emailrecibir;
    }

    public function setEmailrecibir(?string $emailrecibir): self
    {
        $this->emailrecibir = $emailrecibir;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getNombreTipster(): ?string
    {
        return $this->nombreTipster;
    }

    public function setNombreTipster(?string $nombreTipster): self
    {
        $this->nombreTipster = $nombreTipster;

        return $this;
    }


}
