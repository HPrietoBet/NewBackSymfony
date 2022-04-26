<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * LoginBookies
 *
 * @ORM\Table(name="login_bookies")
 * @ORM\Entity(repositoryClass="App\Repository\Main\LoginBookiesRepository")
 */
class LoginBookies
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
     * @ORM\Column(name="username", type="string", length=254, nullable=false)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=254, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="plain_password", type="string", length=255, nullable=false)
     */
    private $plainPassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="campanias", type="text", length=0, nullable=true)
     */
    private $campanias;

    /**
     * @var string
     *
     * @ORM\Column(name="ultimo_login", type="string", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $ultimoLogin = '0000-00-00 00:00:00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip", type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getCampanias(): ?string
    {
        return $this->campanias;
    }

    public function setCampanias(?string $campanias): self
    {
        $this->campanias = $campanias;

        return $this;
    }

    public function getUltimoLogin(): ?string
    {
        return $this->ultimoLogin;
    }

    public function setUltimoLogin(string $ultimoLogin): self
    {
        $this->ultimoLogin = $ultimoLogin;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

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
