<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosProyectos
 *
 * @ORM\Table(name="usuarios_proyectos", indexes={@ORM\Index(name="id_usuario", columns={"id_usuario"}), @ORM\Index(name="id_proyecto", columns={"id_proyecto"})})
  * @ORM\Entity(repositoryClass="App\Repository\Ggms\UsuariosProyectosRepository")
 */
class UsuariosProyectos
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
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;

    /**
     * @var \Proyectos
     *
     * @ORM\ManyToOne(targetEntity="Proyectos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proyecto", referencedColumnName="id")
     * })
     */
    private $idProyecto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuario(): ?Usuarios
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?Usuarios $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdProyecto(): ?Proyectos
    {
        return $this->idProyecto;
    }

    public function setIdProyecto(?Proyectos $idProyecto): self
    {
        $this->idProyecto = $idProyecto;

        return $this;
    }


}
