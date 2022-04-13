<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * LoginBusinessBack
 *
 * @ORM\Table(name="login_business_back")
 * @ORM\Entity(repositoryClass="App\Repository\Main\LoginBusinessBackRepostory")
 */
class LoginBusinessBack
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
     * @ORM\Column(name="username", type="string", length=80, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password_id", type="string", length=255, nullable=false)
     */
    private $passwordId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="avatar", type="string", length=256, nullable=true)
     */
    private $avatar;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel_user", type="integer", nullable=false)
     */
    private $nivelUser;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=false)
     */
    private $lang;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_pago", type="integer", nullable=true)
     */
    private $idPago;

    /**
     * @var float|null
     *
     * @ORM\Column(name="pago_min", type="float", precision=9, scale=2, nullable=true)
     */
    private $pagoMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcuenta", type="string", length=60, nullable=true)
     */
    private $numcuenta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prefijo", type="string", length=5, nullable=true)
     */
    private $prefijo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=24, nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="myip", type="string", length=60, nullable=false)
     */
    private $myip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="huso_horario", type="string", length=5, nullable=true, options={"default"="+2"})
     */
    private $husoHorario = '+2';

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    /**
     * @var bool
     *
     * @ORM\Column(name="premiumpay", type="boolean", nullable=false)
     */
    private $premiumpay;

    /**
     * @var int
     *
     * @ORM\Column(name="payu", type="integer", nullable=false)
     */
    private $payu = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="nuevo_betandeal", type="boolean", nullable=true)
     */
    private $nuevoBetandeal = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="landingcreator", type="boolean", nullable=true, options={"default"="1"})
     */
    private $landingcreator = true;

    /**
     * @var float|null
     *
     * @ORM\Column(name="comision_pay", type="float", precision=9, scale=2, nullable=true)
     */
    private $comisionPay;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="pago_custom", type="boolean", nullable=true)
     */
    private $pagoCustom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fuentes_trafico", type="text", length=0, nullable=true)
     */
    private $fuentesTrafico;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roles", type="text", length=0, nullable=true)
     */
    private $roles;

    /**
     * @var string|null
     *
     * @ORM\Column(name="plainpassword", type="string", length=255, nullable=true)
     */
    private $plainpassword;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_web", type="string", length=255, nullable=true)
     */
    private $urlWeb;

    /**
     * @var string|null
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telegram", type="string", length=255, nullable=true)
     */
    private $telegram;

    /**
     * @var string|null
     *
     * @ORM\Column(name="instagram", type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @var string|null
     *
     * @ORM\Column(name="otra_url", type="string", length=255, nullable=true)
     */
    private $otraUrl;

    /**
     * @var bool
     *
     * @ORM\Column(name="admin_login", type="boolean", nullable=false)
     */
    private $adminLogin = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="admin_login_expires", type="datetime", nullable=true)
     */
    private $adminLoginExpires;

    /**
     * @var string|null
     *
     * @ORM\Column(name="admin_login_password", type="string", length=255, nullable=true)
     */
    private $adminLoginPassword;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="mostrar_adminlogin", type="boolean", nullable=true)
     */
    private $mostrarAdminlogin;

    /**
     * @var bool
     *
     * @ORM\Column(name="acepta_premiumpay", type="boolean", nullable=false, options={"comment"="cambio iva 21% 1 de enero de 2021"})
     */
    private $aceptaPremiumpay = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="links_directos", type="boolean", nullable=true)
     */
    private $linksDirectos = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="links_directos_italia", type="boolean", nullable=true)
     */
    private $linksDirectosItalia = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="responsable", type="integer", nullable=true)
     */
    private $responsable;

    /**
     * @var bool
     *
     * @ORM\Column(name="marketing", type="boolean", nullable=false)
     */
    private $marketing = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ver_cpas", type="integer", nullable=false, options={"default"="1"})
     */
    private $verCpas = 1;

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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getNivelUser(): ?int
    {
        return $this->nivelUser;
    }

    public function setNivelUser(int $nivelUser): self
    {
        $this->nivelUser = $nivelUser;

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

    public function getIdPago(): ?int
    {
        return $this->idPago;
    }

    public function setIdPago(?int $idPago): self
    {
        $this->idPago = $idPago;

        return $this;
    }

    public function getPagoMin(): ?float
    {
        return $this->pagoMin;
    }

    public function setPagoMin(?float $pagoMin): self
    {
        $this->pagoMin = $pagoMin;

        return $this;
    }

    public function getNumcuenta(): ?string
    {
        return $this->numcuenta;
    }

    public function setNumcuenta(?string $numcuenta): self
    {
        $this->numcuenta = $numcuenta;

        return $this;
    }

    public function getPrefijo(): ?string
    {
        return $this->prefijo;
    }

    public function setPrefijo(?string $prefijo): self
    {
        $this->prefijo = $prefijo;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getMyip(): ?string
    {
        return $this->myip;
    }

    public function setMyip(string $myip): self
    {
        $this->myip = $myip;

        return $this;
    }

    public function getHusoHorario(): ?string
    {
        return $this->husoHorario;
    }

    public function setHusoHorario(?string $husoHorario): self
    {
        $this->husoHorario = $husoHorario;

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

    public function getPremiumpay(): ?bool
    {
        return $this->premiumpay;
    }

    public function setPremiumpay(bool $premiumpay): self
    {
        $this->premiumpay = $premiumpay;

        return $this;
    }

    public function getPayu(): ?int
    {
        return $this->payu;
    }

    public function setPayu(int $payu): self
    {
        $this->payu = $payu;

        return $this;
    }

    public function getNuevoBetandeal(): ?bool
    {
        return $this->nuevoBetandeal;
    }

    public function setNuevoBetandeal(?bool $nuevoBetandeal): self
    {
        $this->nuevoBetandeal = $nuevoBetandeal;

        return $this;
    }

    public function getLandingcreator(): ?bool
    {
        return $this->landingcreator;
    }

    public function setLandingcreator(?bool $landingcreator): self
    {
        $this->landingcreator = $landingcreator;

        return $this;
    }

    public function getComisionPay(): ?float
    {
        return $this->comisionPay;
    }

    public function setComisionPay(?float $comisionPay): self
    {
        $this->comisionPay = $comisionPay;

        return $this;
    }

    public function getPagoCustom(): ?bool
    {
        return $this->pagoCustom;
    }

    public function setPagoCustom(?bool $pagoCustom): self
    {
        $this->pagoCustom = $pagoCustom;

        return $this;
    }

    public function getFuentesTrafico(): ?string
    {
        return $this->fuentesTrafico;
    }

    public function setFuentesTrafico(?string $fuentesTrafico): self
    {
        $this->fuentesTrafico = $fuentesTrafico;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

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

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getUrlWeb(): ?string
    {
        return $this->urlWeb;
    }

    public function setUrlWeb(?string $urlWeb): self
    {
        $this->urlWeb = $urlWeb;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getTelegram(): ?string
    {
        return $this->telegram;
    }

    public function setTelegram(?string $telegram): self
    {
        $this->telegram = $telegram;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getOtraUrl(): ?string
    {
        return $this->otraUrl;
    }

    public function setOtraUrl(?string $otraUrl): self
    {
        $this->otraUrl = $otraUrl;

        return $this;
    }

    public function getAdminLogin(): ?bool
    {
        return $this->adminLogin;
    }

    public function setAdminLogin(bool $adminLogin): self
    {
        $this->adminLogin = $adminLogin;

        return $this;
    }

    public function getAdminLoginExpires(): ?\DateTimeInterface
    {
        return $this->adminLoginExpires;
    }

    public function setAdminLoginExpires(?\DateTimeInterface $adminLoginExpires): self
    {
        $this->adminLoginExpires = $adminLoginExpires;

        return $this;
    }

    public function getAdminLoginPassword(): ?string
    {
        return $this->adminLoginPassword;
    }

    public function setAdminLoginPassword(?string $adminLoginPassword): self
    {
        $this->adminLoginPassword = $adminLoginPassword;

        return $this;
    }

    public function getMostrarAdminlogin(): ?bool
    {
        return $this->mostrarAdminlogin;
    }

    public function setMostrarAdminlogin(?bool $mostrarAdminlogin): self
    {
        $this->mostrarAdminlogin = $mostrarAdminlogin;

        return $this;
    }

    public function getAceptaPremiumpay(): ?bool
    {
        return $this->aceptaPremiumpay;
    }

    public function setAceptaPremiumpay(bool $aceptaPremiumpay): self
    {
        $this->aceptaPremiumpay = $aceptaPremiumpay;

        return $this;
    }

    public function getLinksDirectos(): ?bool
    {
        return $this->linksDirectos;
    }

    public function setLinksDirectos(?bool $linksDirectos): self
    {
        $this->linksDirectos = $linksDirectos;

        return $this;
    }

    public function getLinksDirectosItalia(): ?bool
    {
        return $this->linksDirectosItalia;
    }

    public function setLinksDirectosItalia(?bool $linksDirectosItalia): self
    {
        $this->linksDirectosItalia = $linksDirectosItalia;

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

    public function getMarketing(): ?bool
    {
        return $this->marketing;
    }

    public function setMarketing(bool $marketing): self
    {
        $this->marketing = $marketing;

        return $this;
    }

    public function getVerCpas(): ?int
    {
        return $this->verCpas;
    }

    public function setVerCpas(int $verCpas): self
    {
        $this->verCpas = $verCpas;

        return $this;
    }


}
