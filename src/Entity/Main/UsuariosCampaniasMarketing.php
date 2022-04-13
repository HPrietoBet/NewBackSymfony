<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuariosCampaniasMarketing
 *
 * @ORM\Table(name="usuarios_campanias_marketing")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UsuariosCampaniasMarketingRepository")
 */
class UsuariosCampaniasMarketing
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
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="pasarela", type="integer", nullable=false)
     */
    private $pasarela;

    /**
     * @var array
     *
     * @ORM\Column(name="producto", type="json", nullable=false)
     */
    private $producto;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=50, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="coste", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $coste;

    /**
     * @var int
     *
     * @ORM\Column(name="total_envios", type="integer", nullable=false)
     */
    private $totalEnvios;

    /**
     * @var string
     *
     * @ORM\Column(name="remitente", type="string", length=255, nullable=false)
     */
    private $remitente;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="text", length=0, nullable=false)
     */
    private $mensaje;

    /**
     * @var string|null
     *
     * @ORM\Column(name="asunto", type="string", length=50, nullable=true)
     */
    private $asunto;

    /**
     * @var bool
     *
     * @ORM\Column(name="estado", type="boolean", nullable=false)
     */
    private $estado;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getPasarela(): ?int
    {
        return $this->pasarela;
    }

    public function setPasarela(int $pasarela): self
    {
        $this->pasarela = $pasarela;

        return $this;
    }

    public function getProducto(): ?array
    {
        return $this->producto;
    }

    public function setProducto(array $producto): self
    {
        $this->producto = $producto;

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

    public function getCoste(): ?string
    {
        return $this->coste;
    }

    public function setCoste(string $coste): self
    {
        $this->coste = $coste;

        return $this;
    }

    public function getTotalEnvios(): ?int
    {
        return $this->totalEnvios;
    }

    public function setTotalEnvios(int $totalEnvios): self
    {
        $this->totalEnvios = $totalEnvios;

        return $this;
    }

    public function getRemitente(): ?string
    {
        return $this->remitente;
    }

    public function setRemitente(string $remitente): self
    {
        $this->remitente = $remitente;

        return $this;
    }

    public function getMensaje(): ?string
    {
        return $this->mensaje;
    }

    public function setMensaje(string $mensaje): self
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    public function getAsunto(): ?string
    {
        return $this->asunto;
    }

    public function setAsunto(?string $asunto): self
    {
        $this->asunto = $asunto;

        return $this;
    }

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }


}
