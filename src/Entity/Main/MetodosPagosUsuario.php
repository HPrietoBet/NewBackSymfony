<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetodosPagosUsuario
 *
 * @ORM\Table(name="metodos_pagos_usuario", indexes={@ORM\Index(name="ix_id_usuario", columns={"id_usuario"}), @ORM\Index(name="IDX_75B96721DB38439E", columns={"usuario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\MetodosPagoUsuarioRepository")
 */
class MetodosPagosUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_metodo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMetodo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_metodo", type="string", length=255, nullable=false)
     */
    private $nombreMetodo;

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer", nullable=false)
     */
    private $activo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=true)
     */
    private $usuarioId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcuentacustom", type="string", length=255, nullable=true)
     */
    private $numcuentacustom;

    public function getIdMetodo(): ?int
    {
        return $this->idMetodo;
    }

    public function getNombreMetodo(): ?string
    {
        return $this->nombreMetodo;
    }

    public function setNombreMetodo(string $nombreMetodo): self
    {
        $this->nombreMetodo = $nombreMetodo;

        return $this;
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

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

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

    public function getUsuarioId(): ?int
    {
        return $this->usuarioId;
    }

    public function setUsuarioId(?int $usuarioId): self
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    public function getNumcuentacustom(): ?string
    {
        return $this->numcuentacustom;
    }

    public function setNumcuentacustom(?string $numcuentacustom): self
    {
        $this->numcuentacustom = $numcuentacustom;

        return $this;
    }


}
