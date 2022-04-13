<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios", indexes={@ORM\Index(name="id", columns={"id"})})
  * @ORM\Entity(repositoryClass="App\Repository\Ggms\UsuariosRepository")
 */
class Usuarios
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=30, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="text", length=0, nullable=false)
     */
    private $roles;

    /**
     * @var string|null
     *
     * @ORM\Column(name="proyectos", type="text", length=0, nullable=true)
     */
    private $proyectos;

    /**
     * @var string
     *
     * @ORM\Column(name="plainpassword", type="string", length=255, nullable=false)
     */
    private $plainpassword;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ultimologin", type="datetime", nullable=true)
     */
    private $ultimologin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip", type="string", length=100, nullable=true)
     */
    private $ip;

    /**
     * @var bool
     *
     * @ORM\Column(name="mostrar_stats", type="boolean", nullable=false, options={"default"="1"})
     */
    private $mostrarStats = true;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getProyectos(): ?string
    {
        return $this->proyectos;
    }

    public function setProyectos(?string $proyectos): self
    {
        $this->proyectos = $proyectos;

        return $this;
    }

    public function getPlainpassword(): ?string
    {
        return $this->plainpassword;
    }

    public function setPlainpassword(string $plainpassword): self
    {
        $this->plainpassword = $plainpassword;

        return $this;
    }

    public function getUltimologin(): ?\DateTimeInterface
    {
        return $this->ultimologin;
    }

    public function setUltimologin(?\DateTimeInterface $ultimologin): self
    {
        $this->ultimologin = $ultimologin;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getMostrarStats(): ?bool
    {
        return $this->mostrarStats;
    }

    public function setMostrarStats(bool $mostrarStats): self
    {
        $this->mostrarStats = $mostrarStats;

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
