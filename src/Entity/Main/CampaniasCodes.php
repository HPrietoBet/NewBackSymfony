<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasCodes
 *
 * @ORM\Table(name="campanias_codes", indexes={@ORM\Index(name="ix_idcampania", columns={"idcampania"}), @ORM\Index(name="ix_id_usuario", columns={"id_usuario"}), @ORM\Index(name="ix_idcasa", columns={"idcasa"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasCodesRepository")

 */
class CampaniasCodes
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
     * @ORM\Column(name="idcasa", type="integer", nullable=false)
     */
    private $idcasa;

    /**
     * @var int
     *
     * @ORM\Column(name="idcampania", type="integer", nullable=false)
     */
    private $idcampania;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=255, nullable=false)
     */
    private $codigo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=true)
     */
    private $idUsuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="project", type="integer", nullable=false)
     */
    private $project = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdcasa(): ?int
    {
        return $this->idcasa;
    }

    public function setIdcasa(int $idcasa): self
    {
        $this->idcasa = $idcasa;

        return $this;
    }

    public function getIdcampania(): ?int
    {
        return $this->idcampania;
    }

    public function setIdcampania(int $idcampania): self
    {
        $this->idcampania = $idcampania;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

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

    public function getProject(): ?int
    {
        return $this->project;
    }

    public function setProject(int $project): self
    {
        $this->project = $project;

        return $this;
    }


}
