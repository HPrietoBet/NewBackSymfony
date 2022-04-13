<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosBetandeal
 *
 * @ORM\Table(name="usuarios_betandeal")
  * @ORM\Entity(repositoryClass="App\Repository\Ggms\UsuariosBetandealRepository")
 */
class UsuariosBetandeal
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
     * @ORM\Column(name="id_betandeal", type="integer", nullable=false)
     */
    private $idBetandeal;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="activo_betandeal", type="integer", nullable=false)
     */
    private $activoBetandeal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mostrar_ggms", type="integer", nullable=true)
     */
    private $mostrarGgms = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBetandeal(): ?int
    {
        return $this->idBetandeal;
    }

    public function setIdBetandeal(int $idBetandeal): self
    {
        $this->idBetandeal = $idBetandeal;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getActivoBetandeal(): ?int
    {
        return $this->activoBetandeal;
    }

    public function setActivoBetandeal(int $activoBetandeal): self
    {
        $this->activoBetandeal = $activoBetandeal;

        return $this;
    }

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(?int $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getMostrarGgms(): ?int
    {
        return $this->mostrarGgms;
    }

    public function setMostrarGgms(?int $mostrarGgms): self
    {
        $this->mostrarGgms = $mostrarGgms;

        return $this;
    }


}
