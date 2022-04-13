<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasEnlaceUsuario
 *
 * @ORM\Table(name="campanias_enlace_usuario", indexes={@ORM\Index(name="ix_id_campania", columns={"id_campania"}), @ORM\Index(name="ix_id_campania_usuario", columns={"id_campania_usuario"}), @ORM\Index(name="ix_id_usuario", columns={"id_usuario"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasEnlaceUsuarioRepository")
 */
class CampaniasEnlaceUsuario
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
     * @var int
     *
     * @ORM\Column(name="id_campania", type="integer", nullable=false)
     */
    private $idCampania;

    /**
     * @var int
     *
     * @ORM\Column(name="id_campania_usuario", type="integer", nullable=false)
     */
    private $idCampaniaUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_enlace", type="string", length=255, nullable=false)
     */
    private $tituloEnlace;

    /**
     * @var string
     *
     * @ORM\Column(name="url_promocionada", type="string", length=255, nullable=false)
     */
    private $urlPromocionada;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_enlace", type="integer", nullable=false)
     */
    private $numeroEnlace;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false, options={"default"="1"})
     */
    private $activo = true;

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

    public function getIdCampania(): ?int
    {
        return $this->idCampania;
    }

    public function setIdCampania(int $idCampania): self
    {
        $this->idCampania = $idCampania;

        return $this;
    }

    public function getIdCampaniaUsuario(): ?int
    {
        return $this->idCampaniaUsuario;
    }

    public function setIdCampaniaUsuario(int $idCampaniaUsuario): self
    {
        $this->idCampaniaUsuario = $idCampaniaUsuario;

        return $this;
    }

    public function getTituloEnlace(): ?string
    {
        return $this->tituloEnlace;
    }

    public function setTituloEnlace(string $tituloEnlace): self
    {
        $this->tituloEnlace = $tituloEnlace;

        return $this;
    }

    public function getUrlPromocionada(): ?string
    {
        return $this->urlPromocionada;
    }

    public function setUrlPromocionada(string $urlPromocionada): self
    {
        $this->urlPromocionada = $urlPromocionada;

        return $this;
    }

    public function getNumeroEnlace(): ?int
    {
        return $this->numeroEnlace;
    }

    public function setNumeroEnlace(int $numeroEnlace): self
    {
        $this->numeroEnlace = $numeroEnlace;

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


}
