<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarjetas
 *
 * @ORM\Table(name="tarjetas", indexes={@ORM\Index(name="IDX_1F7B79A97EB2C349", columns={"id_usuario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\TarjetasRepository")
 */
class Tarjetas
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
     * @ORM\Column(name="numero", type="string", length=255, nullable=true)
     */
    private $numero;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cvv", type="integer", nullable=true)
     */
    private $cvv;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="expired", type="date", nullable=true)
     */
    private $expired;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer", nullable=false)
     */
    private $activo;

    /**
     * @var int
     *
     * @ORM\Column(name="tarjetadefecto", type="integer", nullable=false)
     */
    private $tarjetadefecto;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="txnid", type="string", length=255, nullable=false)
     */
    private $txnid;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_id", referencedColumnName="id")
     * })
     */
    private $idUsuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCvv(): ?int
    {
        return $this->cvv;
    }

    public function setCvv(?int $cvv): self
    {
        $this->cvv = $cvv;

        return $this;
    }

    public function getExpired(): ?\DateTimeInterface
    {
        return $this->expired;
    }

    public function setExpired(?\DateTimeInterface $expired): self
    {
        $this->expired = $expired;

        return $this;
    }

    public function getActivo(): ?int
    {
        return $this->activo;
    }

    public function setActivo(int $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getTarjetadefecto(): ?int
    {
        return $this->tarjetadefecto;
    }

    public function setTarjetadefecto(int $tarjetadefecto): self
    {
        $this->tarjetadefecto = $tarjetadefecto;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getTxnid(): ?string
    {
        return $this->txnid;
    }

    public function setTxnid(string $txnid): self
    {
        $this->txnid = $txnid;

        return $this;
    }

    public function getIdUsuario(): ?User
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?User $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }


}
