<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacturacionEstados
 *
 * @ORM\Table(name="facturacion_estados", indexes={@ORM\Index(name="ix_estado", columns={"id_estado"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\FacturacionEstadosRepository")
 */
class FacturacionEstados
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_txt", type="string", length=100, nullable=false)
     */
    private $estadoTxt = '';

    /**
     * @var string
     *
     * @ORM\Column(name="color_estado", type="string", length=7, nullable=false)
     */
    private $colorEstado = '';

    public function getIdEstado(): ?int
    {
        return $this->idEstado;
    }

    public function getEstadoTxt(): ?string
    {
        return $this->estadoTxt;
    }

    public function setEstadoTxt(string $estadoTxt): self
    {
        $this->estadoTxt = $estadoTxt;

        return $this;
    }

    public function getColorEstado(): ?string
    {
        return $this->colorEstado;
    }

    public function setColorEstado(string $colorEstado): self
    {
        $this->colorEstado = $colorEstado;

        return $this;
    }


}
