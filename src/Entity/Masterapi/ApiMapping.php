<?php

namespace App\Entity\Masterapi;
use Doctrine\ORM\Mapping as ORM;

/**
 * ApiMapping
 *
 * @ORM\Table(name="api_mapping", indexes={@ORM\Index(name="IDX_A4D858EDDD03F01", columns={"connection_id"})})
 * @ORM\Entity
 */
class ApiMapping
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
     * @var string|null
     *
     * @ORM\Column(name="campo_api", type="string", length=255, nullable=true)
     */
    private $campoApi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="campo_propio", type="string", length=255, nullable=true)
     */
    private $campoPropio;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="important_field", type="boolean", nullable=true)
     */
    private $importantField;

    /**
     * @var bool
     *
     * @ORM\Column(name="secondary_field", type="boolean", nullable=false)
     */
    private $secondaryField;

    /**
     * @var \ApiConnections
     *
     * @ORM\ManyToOne(targetEntity="ApiConnections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="connection_id", referencedColumnName="id")
     * })
     */
    private $connection;


}
