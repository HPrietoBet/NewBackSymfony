<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomLinks
 *
 * @ORM\Table(name="custom_links")
 * @ORM\Entity(repositoryClass="App\Repository\Main\CustomLinksRepository")
 */
class CustomLinks
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=true)
     */
    private $idUsuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pais", type="string", length=1023, nullable=true)
     */
    private $pais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="casas", type="string", length=1023, nullable=true)
     */
    private $casas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fecha", type="string", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $fecha = 'CURRENT_TIMESTAMP';

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(?string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getCasas(): ?string
    {
        return $this->casas;
    }

    public function setCasas(?string $casas): self
    {
        $this->casas = $casas;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(?string $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }


}
