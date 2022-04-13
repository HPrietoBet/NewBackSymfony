<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * PasarelaBetandealProducto
 *
 * @ORM\Table(name="pasarela_betandeal_producto", indexes={@ORM\Index(name="fk_idpasarela", columns={"idpasarela"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\ProductoRepository")
 */
class PasarelaBetandealProducto
{
    /**
     * @var int
     *
     * @ORM\Column(name="idproducto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproducto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idpasarela", type="integer", nullable=true, options={"comment"="Id de pasarela a la que esta asignado"})
     */
    private $idpasarela;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=1000, nullable=true)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precio", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $precio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precio_cop", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $precioCop;

    /**
     * @var string
     *
     * @ORM\Column(name="moneda", type="string", length=10, nullable=false, options={"default"="EUR"})
     */
    private $moneda = 'EUR';

    /**
     * @var string|null
     *
     * @ORM\Column(name="enlace", type="string", length=300, nullable=true)
     */
    private $enlace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipster", type="string", length=100, nullable=true)
     */
    private $tipster;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailtipster", type="string", length=45, nullable=true, options={"default"="si"})
     */
    private $emailtipster = 'si';

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailcomprador", type="string", length=45, nullable=true, options={"default"="si"})
     */
    private $emailcomprador = 'si';

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false, options={"default"="1"})
     */
    private $activo = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="devoluciones", type="boolean", nullable=false)
     */
    private $devoluciones = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen_filename", type="string", length=45, nullable=true)
     */
    private $imagenFilename;

    public function getIdproducto(): ?int
    {
        return $this->idproducto;
    }

    public function getIdpasarela(): ?int
    {
        return $this->idpasarela;
    }

    public function setIdpasarela(?int $idpasarela): self
    {
        $this->idpasarela = $idpasarela;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(?string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getPrecioCop(): ?string
    {
        return $this->precioCop;
    }

    public function setPrecioCop(?string $precioCop): self
    {
        $this->precioCop = $precioCop;

        return $this;
    }

    public function getMoneda(): ?string
    {
        return $this->moneda;
    }

    public function setMoneda(string $moneda): self
    {
        $this->moneda = $moneda;

        return $this;
    }

    public function getEnlace(): ?string
    {
        return $this->enlace;
    }

    public function setEnlace(?string $enlace): self
    {
        $this->enlace = $enlace;

        return $this;
    }

    public function getTipster(): ?string
    {
        return $this->tipster;
    }

    public function setTipster(?string $tipster): self
    {
        $this->tipster = $tipster;

        return $this;
    }

    public function getEmailtipster(): ?string
    {
        return $this->emailtipster;
    }

    public function setEmailtipster(?string $emailtipster): self
    {
        $this->emailtipster = $emailtipster;

        return $this;
    }

    public function getEmailcomprador(): ?string
    {
        return $this->emailcomprador;
    }

    public function setEmailcomprador(?string $emailcomprador): self
    {
        $this->emailcomprador = $emailcomprador;

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

    public function getDevoluciones(): ?bool
    {
        return $this->devoluciones;
    }

    public function setDevoluciones(bool $devoluciones): self
    {
        $this->devoluciones = $devoluciones;

        return $this;
    }

    public function getImagenFilename(): ?string
    {
        return $this->imagenFilename;
    }

    public function setImagenFilename(?string $imagenFilename): self
    {
        $this->imagenFilename = $imagenFilename;

        return $this;
    }


}
