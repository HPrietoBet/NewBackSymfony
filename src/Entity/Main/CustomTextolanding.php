<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomTextolanding
 *
 * @ORM\Table(name="custom_textolanding")
 * @ORM\Entity(repositoryClass="App\Repository\Main\CustomTextoLandingRepository")
 */
class CustomTextolanding
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
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_usuario", type="string", length=255, nullable=false)
     */
    private $nombreUsuario;

    /**
     * @var int
     *
     * @ORM\Column(name="id_campania", type="integer", nullable=false)
     */
    private $idCampania;

    /**
     * @var string
     *
     * @ORM\Column(name="texto_custom", type="string", length=255, nullable=false)
     */
    private $textoCustom;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer", nullable=false)
     */
    private $activo = '0';

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNombreUsuario(): ?string
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario(string $nombreUsuario): self
    {
        $this->nombreUsuario = $nombreUsuario;

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

    public function getTextoCustom(): ?string
    {
        return $this->textoCustom;
    }

    public function setTextoCustom(string $textoCustom): self
    {
        $this->textoCustom = $textoCustom;

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
