<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescuentoProducto
 *
 * @ORM\Table(name="descuento_producto", indexes={@ORM\Index(name="fk_descuento_producto_pasarela_betandeal_producto1_idx", columns={"idproducto"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\DescuentoProductosRepository")
 */
class DescuentoProducto
{
    /**
     * @var int
     *
     * @ORM\Column(name="iddescuento_producto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddescuentoProducto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo", type="string", length=45, nullable=true)
     */
    private $codigo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="porcentaje_descuento", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $porcentajeDescuento;

    /**
     * @var int|null
     *
     * @ORM\Column(name="max_usos", type="integer", nullable=true)
     */
    private $maxUsos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="utilizados", type="integer", nullable=true)
     */
    private $utilizados = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false, options={"default"="1"})
     */
    private $activo = true;

    /**
     * @var int|null
     *
     * @ORM\Column(name="completados", type="integer", nullable=true)
     */
    private $completados = '0';

    /**
     * @var \PasarelaBetandealProducto
     *
     * @ORM\ManyToOne(targetEntity="PasarelaBetandealProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproducto", referencedColumnName="idproducto")
     * })
     */
    private $idproducto;

    public function getIddescuentoProducto(): ?int
    {
        return $this->iddescuentoProducto;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getPorcentajeDescuento(): ?string
    {
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento(?string $porcentajeDescuento): self
    {
        $this->porcentajeDescuento = $porcentajeDescuento;

        return $this;
    }

    public function getMaxUsos(): ?int
    {
        return $this->maxUsos;
    }

    public function setMaxUsos(?int $maxUsos): self
    {
        $this->maxUsos = $maxUsos;

        return $this;
    }

    public function getUtilizados(): ?int
    {
        return $this->utilizados;
    }

    public function setUtilizados(?int $utilizados): self
    {
        $this->utilizados = $utilizados;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getCompletados(): ?int
    {
        return $this->completados;
    }

    public function setCompletados(?int $completados): self
    {
        $this->completados = $completados;

        return $this;
    }

    public function getIdproducto(): ?PasarelaBetandealProducto
    {
        return $this->idproducto;
    }

    public function setIdproducto(?PasarelaBetandealProducto $idproducto): self
    {
        $this->idproducto = $idproducto;

        return $this;
    }


}
