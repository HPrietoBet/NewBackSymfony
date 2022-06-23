<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stats
 *
 * @ORM\Table(name="stats", indexes={@ORM\Index(name="IDX_574767AA12347869", columns={"tipo_conexion_id"}), @ORM\Index(name="IDX_574767AAC12FCF20", columns={"tipo_api_id"}), @ORM\Index(name="IDX_574767AA4A50A7F2", columns={"api_user_id"})})
 * @ORM\Entity
 */
class Stats
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_execution", type="datetime", nullable=true)
     */
    private $lastExecution;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="completed", type="boolean", nullable=true)
     */
    private $completed;

    /**
     * @var \ApiUsers
     *
     * @ORM\ManyToOne(targetEntity="ApiUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="api_user_id", referencedColumnName="id")
     * })
     */
    private $apiUser;

    /**
     * @var \ApiConnections
     *
     * @ORM\ManyToOne(targetEntity="ApiConnections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_conexion_id", referencedColumnName="id")
     * })
     */
    private $tipoConexion;

    /**
     * @var \ApiTypes
     *
     * @ORM\ManyToOne(targetEntity="ApiTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_api_id", referencedColumnName="id")
     * })
     */
    private $tipoApi;


}
