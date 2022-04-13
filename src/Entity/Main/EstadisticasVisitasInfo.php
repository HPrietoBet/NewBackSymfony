<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadisticasVisitasInfo
 *
 * @ORM\Table(name="estadisticas_visitas_info")
 * @ORM\Entity(repositoryClass="App\Repository\Main\EstadisticasVisitasInfoRepository")
 */
class EstadisticasVisitasInfo
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
     * @ORM\Column(name="id_ip", type="integer", nullable=false)
     */
    private $idIp;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user_afiliado", type="integer", nullable=false)
     */
    private $idUserAfiliado;

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var int
     *
     * @ORM\Column(name="id_camp", type="integer", nullable=false)
     */
    private $idCamp;

    /**
     * @var int
     *
     * @ORM\Column(name="id_casa", type="integer", nullable=false)
     */
    private $idCasa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ip", type="date", nullable=false)
     */
    private $fechaIp;

    /**
     * @var int
     *
     * @ORM\Column(name="clicks", type="integer", nullable=false)
     */
    private $clicks;

    /**
     * @var int
     *
     * @ORM\Column(name="clicks_unicos", type="integer", nullable=false)
     */
    private $clicksUnicos;

    /**
     * @var int
     *
     * @ORM\Column(name="clicks_total", type="integer", nullable=false)
     */
    private $clicksTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="clicks_unicos_total", type="integer", nullable=false)
     */
    private $clicksUnicosTotal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdIp(): ?int
    {
        return $this->idIp;
    }

    public function setIdIp(int $idIp): self
    {
        $this->idIp = $idIp;

        return $this;
    }

    public function getIdUserAfiliado(): ?int
    {
        return $this->idUserAfiliado;
    }

    public function setIdUserAfiliado(int $idUserAfiliado): self
    {
        $this->idUserAfiliado = $idUserAfiliado;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdCamp(): ?int
    {
        return $this->idCamp;
    }

    public function setIdCamp(int $idCamp): self
    {
        $this->idCamp = $idCamp;

        return $this;
    }

    public function getIdCasa(): ?int
    {
        return $this->idCasa;
    }

    public function setIdCasa(int $idCasa): self
    {
        $this->idCasa = $idCasa;

        return $this;
    }

    public function getFechaIp(): ?\DateTimeInterface
    {
        return $this->fechaIp;
    }

    public function setFechaIp(\DateTimeInterface $fechaIp): self
    {
        $this->fechaIp = $fechaIp;

        return $this;
    }

    public function getClicks(): ?int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): self
    {
        $this->clicks = $clicks;

        return $this;
    }

    public function getClicksUnicos(): ?int
    {
        return $this->clicksUnicos;
    }

    public function setClicksUnicos(int $clicksUnicos): self
    {
        $this->clicksUnicos = $clicksUnicos;

        return $this;
    }

    public function getClicksTotal(): ?int
    {
        return $this->clicksTotal;
    }

    public function setClicksTotal(int $clicksTotal): self
    {
        $this->clicksTotal = $clicksTotal;

        return $this;
    }

    public function getClicksUnicosTotal(): ?int
    {
        return $this->clicksUnicosTotal;
    }

    public function setClicksUnicosTotal(int $clicksUnicosTotal): self
    {
        $this->clicksUnicosTotal = $clicksUnicosTotal;

        return $this;
    }


}
