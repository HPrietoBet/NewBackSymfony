<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPremiumpay
 *
 * @ORM\Table(name="user_premiumpay", indexes={@ORM\Index(name="ix_email", columns={"email"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\UserPremiumpayRepository")
 */
class UserPremiumpay
{
    /**
     * @var int
     *
     * @ORM\Column(name="iduser_premiumpay", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduserPremiumpay;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=45, nullable=true)
     */
    private $telefono;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="recibir_spam", type="boolean", nullable=true)
     */
    private $recibirSpam;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="saldo_actual", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $saldoActual = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="saldo_retenido", type="decimal", precision=10, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $saldoRetenido = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono_prefijo", type="string", length=5, nullable=true)
     */
    private $telefonoPrefijo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono_pais_iso", type="string", length=2, nullable=true)
     */
    private $telefonoPaisIso;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ts_registered", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $tsRegistered = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen_filename", type="string", length=45, nullable=true)
     */
    private $imagenFilename;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_aceptaspam", type="datetime", nullable=true)
     */
    private $dtAceptaspam;

    /**
     * @var string|null
     *
     * @ORM\Column(name="repass_token", type="string", length=45, nullable=true)
     */
    private $repassToken;

    /**
     * @var string|null
     *
     * @ORM\Column(name="validation_token", type="string", length=45, nullable=true)
     */
    private $validationToken;

    /**
     * @var string|null
     *
     * @ORM\Column(name="impersonate_token", type="string", length=45, nullable=true)
     */
    private $impersonateToken;

    public function getIduserPremiumpay(): ?int
    {
        return $this->iduserPremiumpay;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getRecibirSpam(): ?bool
    {
        return $this->recibirSpam;
    }

    public function setRecibirSpam(?bool $recibirSpam): self
    {
        $this->recibirSpam = $recibirSpam;

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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getSaldoActual(): ?string
    {
        return $this->saldoActual;
    }

    public function setSaldoActual(?string $saldoActual): self
    {
        $this->saldoActual = $saldoActual;

        return $this;
    }

    public function getSaldoRetenido(): ?string
    {
        return $this->saldoRetenido;
    }

    public function setSaldoRetenido(?string $saldoRetenido): self
    {
        $this->saldoRetenido = $saldoRetenido;

        return $this;
    }

    public function getTelefonoPrefijo(): ?string
    {
        return $this->telefonoPrefijo;
    }

    public function setTelefonoPrefijo(?string $telefonoPrefijo): self
    {
        $this->telefonoPrefijo = $telefonoPrefijo;

        return $this;
    }

    public function getTelefonoPaisIso(): ?string
    {
        return $this->telefonoPaisIso;
    }

    public function setTelefonoPaisIso(?string $telefonoPaisIso): self
    {
        $this->telefonoPaisIso = $telefonoPaisIso;

        return $this;
    }

    public function getTsRegistered(): ?\DateTimeInterface
    {
        return $this->tsRegistered;
    }

    public function setTsRegistered(?\DateTimeInterface $tsRegistered): self
    {
        $this->tsRegistered = $tsRegistered;

        return $this;
    }

    public function getImagenFilename(): ?string
    {
        return $this->imagenFilename;
    }

    public function setImagenFilename(?string $imagenFilename): self
    {
        $this->imagenFilename = $imagenFilename;

        return $this;
    }

    public function getDtAceptaspam(): ?\DateTimeInterface
    {
        return $this->dtAceptaspam;
    }

    public function setDtAceptaspam(?\DateTimeInterface $dtAceptaspam): self
    {
        $this->dtAceptaspam = $dtAceptaspam;

        return $this;
    }

    public function getRepassToken(): ?string
    {
        return $this->repassToken;
    }

    public function setRepassToken(?string $repassToken): self
    {
        $this->repassToken = $repassToken;

        return $this;
    }

    public function getValidationToken(): ?string
    {
        return $this->validationToken;
    }

    public function setValidationToken(?string $validationToken): self
    {
        $this->validationToken = $validationToken;

        return $this;
    }

    public function getImpersonateToken(): ?string
    {
        return $this->impersonateToken;
    }

    public function setImpersonateToken(?string $impersonateToken): self
    {
        $this->impersonateToken = $impersonateToken;

        return $this;
    }


}
