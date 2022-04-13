<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAceptarterminos
 *
 * @ORM\Table(name="usuarios_aceptarterminos")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosTerminosRepository")
 */
class UsuariosAceptarterminos
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
     * @var bool
     *
     * @ORM\Column(name="acepta_politica", type="boolean", nullable=false)
     */
    private $aceptaPolitica;

    /**
     * @var bool
     *
     * @ORM\Column(name="acepta_terminos", type="boolean", nullable=false)
     */
    private $aceptaTerminos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

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

    public function getAceptaPolitica(): ?bool
    {
        return $this->aceptaPolitica;
    }

    public function setAceptaPolitica(bool $aceptaPolitica): self
    {
        $this->aceptaPolitica = $aceptaPolitica;

        return $this;
    }

    public function getAceptaTerminos(): ?bool
    {
        return $this->aceptaTerminos;
    }

    public function setAceptaTerminos(bool $aceptaTerminos): self
    {
        $this->aceptaTerminos = $aceptaTerminos;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }


}
