<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * ApiUsers
 *
 * @ORM\Table(name="api_users")
 * @ORM\Entity
 */
class ApiUsers
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
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cryptkeys", type="string", length=255, nullable=true)
     */
    private $cryptkeys;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var string
     *
     * @ORM\Column(name="plain_password", type="string", length=255, nullable=false)
     */
    private $plainPassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="token_provisional", type="string", length=255, nullable=true)
     */
    private $tokenProvisional;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="token_expires", type="datetime", nullable=true)
     */
    private $tokenExpires;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="global_access", type="boolean", nullable=true)
     */
    private $globalAccess;


}
