<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * LoginAdmin
 *
 * @ORM\Table(name="login_admin")
 * @ORM\Entity(repositoryClass="App\Repository\Main\LoginAdminRepository")
 */

class LoginAdmin implements UserInterface
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
     * @ORM\Column(name="user", type="string", length=256, nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=40, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password_id", type="string", length=40, nullable=false)
     */
    private $passwordId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="plainpassword", type="string", length=255, nullable=true)
     */
    private $plainpassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="nivel_user", type="boolean", nullable=true)
     */
    private $nivelUser;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=255, nullable=false, options={"comment"="ROLE_ADMIN, ROLE_AFFILIATE, ROLE_SUPERADMIN"})
     */
    private $roles;

    /**
     * @var int|null
     *
     * @ORM\Column(name="responsable", type="integer", nullable=true)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=false)
     */
    private $lang;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=24, nullable=true)
     */
    private $telefono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ultimoacceso", type="string", nullable=true)
     */
    private $ultimoacceso;

    /**
     * @var string|null
     *
     * @ORM\Column(name="myip", type="string", length=20, nullable=true)
     */
    private $myip;

    /**
     * @var int
     *
     * @ORM\Column(name="es_responsable", type="integer", nullable=false, options={"default"="1"})
     */
    private $esResponsable = 1;

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

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
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

    public function getPasswordId(): ?string
    {
        return $this->passwordId;
    }

    public function setPasswordId(string $passwordId): self
    {
        $this->passwordId = $passwordId;

        return $this;
    }

    public function getPlainpassword(): ?string
    {
        return $this->plainpassword;
    }

    public function setPlainpassword(?string $plainpassword): self
    {
        $this->plainpassword = $plainpassword;

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

    public function getNivelUser(): ?bool
    {
        return $this->nivelUser;
    }

    public function setNivelUser(?bool $nivelUser): self
    {
        $this->nivelUser = $nivelUser;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getResponsable(): ?int
    {
        return $this->responsable;
    }

    public function setResponsable(?int $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

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

    public function getUltimoacceso(): ?string
    {
        return $this->ultimoacceso;
    }

    public function setUltimoacceso(?string $ultimoacceso): self
    {
        $this->ultimoacceso = $ultimoacceso;

        return $this;
    }

    public function getMyip(): ?string
    {
        return $this->myip;
    }

    public function setMyip(?string $myip): self
    {
        $this->myip = $myip;

        return $this;
    }

    public function getEsResponsable(): ?int
    {
        return $this->esResponsable;
    }

    public function setEsResponsable(int $esResponsable): self
    {
        $this->esResponsable = $esResponsable;

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

    public function getSalt(){

    }

    public function eraseCredentials(){

    }

}
