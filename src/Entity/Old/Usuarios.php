<?php

namespace App\Entity\Old;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios", indexes={@ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity
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


}
