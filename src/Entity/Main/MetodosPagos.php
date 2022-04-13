<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetodosPagos
 *
 * @ORM\Table(name="metodos_pagos")
 * @ORM\Entity(repositoryClass="App\Repository\Main\MetodosPagoRepository")
 */
class MetodosPagos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pago", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPago;

    /**
     * @var string
     *
     * @ORM\Column(name="titulopago", type="string", length=60, nullable=false)
     */
    private $titulopago;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    public function getIdPago(): ?int
    {
        return $this->idPago;
    }

    public function getTitulopago(): ?string
    {
        return $this->titulopago;
    }

    public function setTitulopago(string $titulopago): self
    {
        $this->titulopago = $titulopago;

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


}
