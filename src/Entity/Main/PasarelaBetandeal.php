<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * PasarelaBetandeal
 *
 * @ORM\Table(name="pasarela_betandeal")
 * @ORM\Entity(repositoryClass="App\Repository\Main\PasarelaBetanDealepository")
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
     * @ORM\Column(name="idpasarela", type="string", length=45, nullable=false)
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
     * @ORM\Column(name="emailrecibir", type="string", length=300, nullable=true)
     */
    private $emailrecibir;

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

    public function getEmailrecibir(): ?string
    {
        return $this->emailrecibir;
    }

    public function setEmailrecibir(?string $emailrecibir): self
    {
        $this->emailrecibir = $emailrecibir;

        return $this;
    }


}
