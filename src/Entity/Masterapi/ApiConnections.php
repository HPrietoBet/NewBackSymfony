<?php

namespace App\Entity\Masterapi;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApiConnections
 *
 * @ORM\Table(name="api_connections", indexes={@ORM\Index(name="IDX_D581769BBA882C90", columns={"apitype_id"})})
 * @ORM\Entity
 */
class ApiConnections
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user", type="string", length=255, nullable=true)
     */
    private $user;

    /**
     * @var string|null
     *
     * @ORM\Column(name="token", type="string", length=500, nullable=true)
     */
    private $token;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_gestion", type="string", length=255, nullable=true)
     */
    private $urlGestion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_api", type="string", length=255, nullable=true)
     */
    private $urlApi;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="tipo", type="boolean", nullable=true)
     */
    private $tipo;

    /**
     * @var \ApiTypes
     *
     * @ORM\ManyToOne(targetEntity="ApiTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="apitype_id", referencedColumnName="id")
     * })
     */
    private $apitype;


}
