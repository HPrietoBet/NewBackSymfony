<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosEnlazados
 *
 * @ORM\Table(name="usuarios_enlazados")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosEnlazadosRepository")
 */
class UsuariosEnlazados
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
     * @ORM\Column(name="usuario_principal", type="integer", nullable=false)
     */
    private $usuarioPrincipal;

    /**
     * @var int
     *
     * @ORM\Column(name="usuario_secundario", type="integer", nullable=false)
     */
    private $usuarioSecundario;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuarioPrincipal(): ?int
    {
        return $this->usuarioPrincipal;
    }

    public function setUsuarioPrincipal(int $usuarioPrincipal): self
    {
        $this->usuarioPrincipal = $usuarioPrincipal;

        return $this;
    }

    public function getUsuarioSecundario(): ?int
    {
        return $this->usuarioSecundario;
    }

    public function setUsuarioSecundario(int $usuarioSecundario): self
    {
        $this->usuarioSecundario = $usuarioSecundario;

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
