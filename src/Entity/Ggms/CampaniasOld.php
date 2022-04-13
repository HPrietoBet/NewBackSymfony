<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasOld
 *
 * @ORM\Table(name="campanias_old", indexes={@ORM\Index(name="casa", columns={"casa"}), @ORM\Index(name="id", columns={"id"}), @ORM\Index(name="connection_api", columns={"connection_api"})})
 * @ORM\Entity(repositoryClass="App\Repository\Ggms\CampaniasOldRepository")
 */
class CampaniasOld
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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones", type="string", length=255, nullable=false)
     */
    private $condiciones;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comision", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $comision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenido", type="text", length=65535, nullable=true)
     */
    private $contenido;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=20, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="connection_api", type="string", length=50, nullable=false)
     */
    private $connectionApi;

    /**
     * @var string
     *
     * @ORM\Column(name="proyectos", type="text", length=0, nullable=false)
     */
    private $proyectos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="casa", type="integer", nullable=true)
     */
    private $casa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uri_enlaces", type="string", length=50, nullable=true)
     */
    private $uriEnlaces;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bono_generico", type="string", length=255, nullable=true)
     */
    private $bonoGenerico;

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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCondiciones(): ?string
    {
        return $this->condiciones;
    }

    public function setCondiciones(string $condiciones): self
    {
        $this->condiciones = $condiciones;

        return $this;
    }

    public function getComision(): ?string
    {
        return $this->comision;
    }

    public function setComision(?string $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(?string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getConnectionApi(): ?string
    {
        return $this->connectionApi;
    }

    public function setConnectionApi(string $connectionApi): self
    {
        $this->connectionApi = $connectionApi;

        return $this;
    }

    public function getProyectos(): ?string
    {
        return $this->proyectos;
    }

    public function setProyectos(string $proyectos): self
    {
        $this->proyectos = $proyectos;

        return $this;
    }

    public function getCasa(): ?int
    {
        return $this->casa;
    }

    public function setCasa(?int $casa): self
    {
        $this->casa = $casa;

        return $this;
    }

    public function getUriEnlaces(): ?string
    {
        return $this->uriEnlaces;
    }

    public function setUriEnlaces(?string $uriEnlaces): self
    {
        $this->uriEnlaces = $uriEnlaces;

        return $this;
    }

    public function getBonoGenerico(): ?string
    {
        return $this->bonoGenerico;
    }

    public function setBonoGenerico(?string $bonoGenerico): self
    {
        $this->bonoGenerico = $bonoGenerico;

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
