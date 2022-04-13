<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadisticasPagosInfo
 *
 * @ORM\Table(name="estadisticas_pagos_info")
 * @ORM\Entity(repositoryClass="App\Repository\Main\EstadísticasPagosInfoRepository")
 */
class EstadisticasPagosInfo
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
     * @ORM\Column(name="id_usuario_afiliado", type="integer", nullable=false)
     */
    private $idUsuarioAfiliado;

    /**
     * @var int
     *
     * @ORM\Column(name="id_camp", type="integer", nullable=false)
     */
    private $idCamp;

    /**
     * @var int
     *
     * @ORM\Column(name="id_casa", type="integer", nullable=false)
     */
    private $idCasa;

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="importe", type="float", precision=10, scale=2, nullable=false)
     */
    private $importe;

    /**
     * @var int
     *
     * @ORM\Column(name="jugadores", type="integer", nullable=false)
     */
    private $jugadores;

    /**
     * @var float
     *
     * @ORM\Column(name="total_importe", type="float", precision=10, scale=2, nullable=false)
     */
    private $totalImporte;

    /**
     * @var int
     *
     * @ORM\Column(name="total_jugadores", type="integer", nullable=false)
     */
    private $totalJugadores;

    /**
     * @var int
     *
     * @ORM\Column(name="id_pago", type="integer", nullable=false)
     */
    private $idPago;

    /**
     * @var int
     *
     * @ORM\Column(name="estado_pago", type="integer", nullable=false)
     */
    private $estadoPago;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuarioAfiliado(): ?int
    {
        return $this->idUsuarioAfiliado;
    }

    public function setIdUsuarioAfiliado(int $idUsuarioAfiliado): self
    {
        $this->idUsuarioAfiliado = $idUsuarioAfiliado;

        return $this;
    }

    public function getIdCamp(): ?int
    {
        return $this->idCamp;
    }

    public function setIdCamp(int $idCamp): self
    {
        $this->idCamp = $idCamp;

        return $this;
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

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

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

    public function getImporte(): ?float
    {
        return $this->importe;
    }

    public function setImporte(float $importe): self
    {
        $this->importe = $importe;

        return $this;
    }

    public function getJugadores(): ?int
    {
        return $this->jugadores;
    }

    public function setJugadores(int $jugadores): self
    {
        $this->jugadores = $jugadores;

        return $this;
    }

    public function getTotalImporte(): ?float
    {
        return $this->totalImporte;
    }

    public function setTotalImporte(float $totalImporte): self
    {
        $this->totalImporte = $totalImporte;

        return $this;
    }

    public function getTotalJugadores(): ?int
    {
        return $this->totalJugadores;
    }

    public function setTotalJugadores(int $totalJugadores): self
    {
        $this->totalJugadores = $totalJugadores;

        return $this;
    }

    public function getIdPago(): ?int
    {
        return $this->idPago;
    }

    public function setIdPago(int $idPago): self
    {
        $this->idPago = $idPago;

        return $this;
    }

    public function getEstadoPago(): ?int
    {
        return $this->estadoPago;
    }

    public function setEstadoPago(int $estadoPago): self
    {
        $this->estadoPago = $estadoPago;

        return $this;
    }


}
