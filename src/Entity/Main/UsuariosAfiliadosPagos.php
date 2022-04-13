<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAfiliadosPagos
 *
 * @ORM\Table(name="usuarios_afiliados_pagos")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosAfiliadosPagosRepository")
 */
class UsuariosAfiliadosPagos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_afil_pago", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAfilPago;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user_afiliado", type="integer", nullable=false)
     */
    private $idUserAfiliado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_pago", type="date", nullable=false)
     */
    private $fechaPago;

    /**
     * @var int
     *
     * @ORM\Column(name="jugadores", type="integer", nullable=false)
     */
    private $jugadores;

    /**
     * @var float
     *
     * @ORM\Column(name="importe_pago", type="float", precision=9, scale=2, nullable=false)
     */
    private $importePago;

    /**
     * @var int
     *
     * @ORM\Column(name="id_pago", type="integer", nullable=false)
     */
    private $idPago;

    /**
     * @var bool
     *
     * @ORM\Column(name="estado_pago", type="boolean", nullable=false)
     */
    private $estadoPago;

    public function getIdAfilPago(): ?int
    {
        return $this->idAfilPago;
    }

    public function getIdUserAfiliado(): ?int
    {
        return $this->idUserAfiliado;
    }

    public function setIdUserAfiliado(int $idUserAfiliado): self
    {
        $this->idUserAfiliado = $idUserAfiliado;

        return $this;
    }

    public function getFechaPago(): ?\DateTimeInterface
    {
        return $this->fechaPago;
    }

    public function setFechaPago(\DateTimeInterface $fechaPago): self
    {
        $this->fechaPago = $fechaPago;

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

    public function getImportePago(): ?float
    {
        return $this->importePago;
    }

    public function setImportePago(float $importePago): self
    {
        $this->importePago = $importePago;

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

    public function getEstadoPago(): ?bool
    {
        return $this->estadoPago;
    }

    public function setEstadoPago(bool $estadoPago): self
    {
        $this->estadoPago = $estadoPago;

        return $this;
    }


}
