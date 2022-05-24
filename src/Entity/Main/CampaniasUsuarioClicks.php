<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasUsuarioClicks
 *
 * @ORM\Table(name="campanias_usuario_clicks", indexes={@ORM\Index(name="fecha", columns={"fecha"}), @ORM\Index(name="ix_ip", columns={"ip"}), @ORM\Index(name="ip", columns={"ip"}), @ORM\Index(name="id_campania", columns={"id_campania"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasUsuarioClickRepository")
 */
class CampaniasUsuarioClicks
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
     * @ORM\Column(name="id_campania", type="integer", nullable=false)
     */
    private $idCampania;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=255, nullable=false)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha", type="string", nullable=false)
     */
    private $fecha;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fecha_ultimo_click", type="string", nullable=true)
     */
    private $fechaUltimoClick;

    /**
     * @var int
     *
     * @ORM\Column(name="clicks_totales_campania_usuario", type="integer", nullable=false)
     */
    private $clicksTotalesCampaniaUsuario;

    /**
     * @var int
     *
     * @ORM\Column(name="clicks_unicos_campania_usuario", type="integer", nullable=false, options={"default"="1"})
     */
    private $clicksUnicosCampaniaUsuario = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCampania(): ?int
    {
        return $this->idCampania;
    }

    public function setIdCampania(int $idCampania): self
    {
        $this->idCampania = $idCampania;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getFechaUltimoClick(): ?string
    {
        return $this->fechaUltimoClick;
    }

    public function setFechaUltimoClick(?string $fechaUltimoClick): self
    {
        $this->fechaUltimoClick = $fechaUltimoClick;

        return $this;
    }

    public function getClicksTotalesCampaniaUsuario(): ?int
    {
        return $this->clicksTotalesCampaniaUsuario;
    }

    public function setClicksTotalesCampaniaUsuario(int $clicksTotalesCampaniaUsuario): self
    {
        $this->clicksTotalesCampaniaUsuario = $clicksTotalesCampaniaUsuario;

        return $this;
    }

    public function getClicksUnicosCampaniaUsuario(): ?int
    {
        return $this->clicksUnicosCampaniaUsuario;
    }

    public function setClicksUnicosCampaniaUsuario(int $clicksUnicosCampaniaUsuario): self
    {
        $this->clicksUnicosCampaniaUsuario = $clicksUnicosCampaniaUsuario;

        return $this;
    }


}
