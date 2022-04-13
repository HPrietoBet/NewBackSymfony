<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAfiliados
 *
 * @ORM\Table(name="usuarios_afiliados", indexes={@ORM\Index(name="ix_id_camp", columns={"id_camp"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosAfiliadosRepository")
 */
class UsuariosAfiliados
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user_afiliado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUserAfiliado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date", nullable=false)
     */
    private $fechaAlta;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_camp", type="integer", nullable=false)
     */
    private $idCamp;

    /**
     * @var string
     *
     * @ORM\Column(name="url_original", type="text", length=65535, nullable=false)
     */
    private $urlOriginal;

    /**
     * @var string
     *
     * @ORM\Column(name="url_automatica", type="text", length=65535, nullable=false)
     */
    private $urlAutomatica;

    /**
     * @var string
     *
     * @ORM\Column(name="url_corta", type="string", length=256, nullable=false)
     */
    private $urlCorta;

    /**
     * @var float
     *
     * @ORM\Column(name="comision", type="float", precision=9, scale=2, nullable=false)
     */
    private $comision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="condiciones_afiliado", type="string", length=255, nullable=true)
     */
    private $condicionesAfiliado;

    /**
     * @var string
     *
     * @ORM\Column(name="activo_afiliado", type="string", length=1, nullable=false)
     */
    private $activoAfiliado;

    public function getIdUserAfiliado(): ?int
    {
        return $this->idUserAfiliado;
    }

    public function getFechaAlta(): ?\DateTimeInterface
    {
        return $this->fechaAlta;
    }

    public function setFechaAlta(\DateTimeInterface $fechaAlta): self
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getUrlOriginal(): ?string
    {
        return $this->urlOriginal;
    }

    public function setUrlOriginal(string $urlOriginal): self
    {
        $this->urlOriginal = $urlOriginal;

        return $this;
    }

    public function getUrlAutomatica(): ?string
    {
        return $this->urlAutomatica;
    }

    public function setUrlAutomatica(string $urlAutomatica): self
    {
        $this->urlAutomatica = $urlAutomatica;

        return $this;
    }

    public function getUrlCorta(): ?string
    {
        return $this->urlCorta;
    }

    public function setUrlCorta(string $urlCorta): self
    {
        $this->urlCorta = $urlCorta;

        return $this;
    }

    public function getComision(): ?float
    {
        return $this->comision;
    }

    public function setComision(float $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    public function getCondicionesAfiliado(): ?string
    {
        return $this->condicionesAfiliado;
    }

    public function setCondicionesAfiliado(?string $condicionesAfiliado): self
    {
        $this->condicionesAfiliado = $condicionesAfiliado;

        return $this;
    }

    public function getActivoAfiliado(): ?string
    {
        return $this->activoAfiliado;
    }

    public function setActivoAfiliado(string $activoAfiliado): self
    {
        $this->activoAfiliado = $activoAfiliado;

        return $this;
    }


}
