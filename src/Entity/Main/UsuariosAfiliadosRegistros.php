<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosAfiliadosRegistros
 *
 * @ORM\Table(name="usuarios_afiliados_registros")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosRegistrosRepository")
 */
class UsuariosAfiliadosRegistros
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reg", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReg;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user_afiliado", type="integer", nullable=false)
     */
    private $idUserAfiliado;

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
     * @ORM\Column(name="id_cat", type="integer", nullable=false)
     */
    private $idCat;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cas_pais", type="integer", nullable=false)
     */
    private $idCasPais;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_importacion", type="date", nullable=false)
     */
    private $fechaImportacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date", nullable=false)
     */
    private $fechaAlta;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_usuario", type="string", length=60, nullable=false)
     */
    private $nombreUsuario;

    public function getIdReg(): ?int
    {
        return $this->idReg;
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

    public function getIdCat(): ?int
    {
        return $this->idCat;
    }

    public function setIdCat(int $idCat): self
    {
        $this->idCat = $idCat;

        return $this;
    }

    public function getIdCasPais(): ?int
    {
        return $this->idCasPais;
    }

    public function setIdCasPais(int $idCasPais): self
    {
        $this->idCasPais = $idCasPais;

        return $this;
    }

    public function getFechaImportacion(): ?\DateTimeInterface
    {
        return $this->fechaImportacion;
    }

    public function setFechaImportacion(\DateTimeInterface $fechaImportacion): self
    {
        $this->fechaImportacion = $fechaImportacion;

        return $this;
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

    public function getNombreUsuario(): ?string
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario(string $nombreUsuario): self
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }


}
