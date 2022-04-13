<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campanias
 *
 * @ORM\Table(name="campanias", indexes={@ORM\Index(name="ix_id_casa", columns={"id_casa"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CampaniasRepository")
 */
class Campanias
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
     * @ORM\Column(name="id_casa", type="integer", nullable=false)
     */
    private $idCasa;

    /**
     * @var string
     *
     * @ORM\Column(name="titcamp", type="string", length=256, nullable=false)
     */
    private $titcamp;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones", type="string", length=256, nullable=false)
     */
    private $condiciones;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txtcamp", type="text", length=65535, nullable=true)
     */
    private $txtcamp;

    /**
     * @var string
     *
     * @ORM\Column(name="titcamp_en", type="string", length=256, nullable=false)
     */
    private $titcampEn;

    /**
     * @var string
     *
     * @ORM\Column(name="condiciones_en", type="string", length=256, nullable=false)
     */
    private $condicionesEn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txtcamp_en", type="text", length=65535, nullable=true)
     */
    private $txtcampEn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenido_especifico", type="text", length=0, nullable=true)
     */
    private $contenidoEspecifico;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenido_especifico_defecto", type="text", length=0, nullable=true)
     */
    private $contenidoEspecificoDefecto;

    /**
     * @var float
     *
     * @ORM\Column(name="comisioncamp", type="float", precision=9, scale=2, nullable=false)
     */
    private $comisioncamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txtlanding", type="string", length=255, nullable=true)
     */
    private $txtlanding;

    /**
     * @var int|null
     *
     * @ORM\Column(name="campaniapublica", type="integer", nullable=true)
     */
    private $campaniapublica;

    /**
     * @var bool
     *
     * @ORM\Column(name="actcamp", type="boolean", nullable=false)
     */
    private $actcamp;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="es_vip", type="boolean", nullable=true)
     */
    private $esVip = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=false)
     */
    private $tipo;

    /**
     * @var bool
     *
     * @ORM\Column(name="mostrarpublico", type="boolean", nullable=false, options={"default"="1"})
     */
    private $mostrarpublico = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="connection_api", type="string", length=255, nullable=true)
     */
    private $connectionApi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uri_enlaces", type="string", length=255, nullable=true)
     */
    private $uriEnlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="idioma_principal", type="string", length=10, nullable=false, options={"default"="es"})
     */
    private $idiomaPrincipal = 'es';

    /**
     * @var array|null
     *
     * @ORM\Column(name="paises", type="json", nullable=true)
     */
    private $paises;

    /**
     * @var int|null
     *
     * @ORM\Column(name="casa_iapuestas", type="integer", nullable=true)
     */
    private $casaIapuestas = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="crear_enlaces", type="integer", nullable=false)
     */
    private $crearEnlaces = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="responsable", type="integer", nullable=true)
     */
    private $responsable;

    /**
     * @var float|null
     *
     * @ORM\Column(name="deposit", type="float", precision=8, scale=2, nullable=true)
     */
    private $deposit;

    /**
     * @var float
     *
     * @ORM\Column(name="wagering", type="float", precision=8, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $wagering = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3, nullable=false)
     */
    private $currency = '';

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitcamp(): ?string
    {
        return $this->titcamp;
    }

    public function setTitcamp(string $titcamp): self
    {
        $this->titcamp = $titcamp;

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

    public function getTxtcamp(): ?string
    {
        return $this->txtcamp;
    }

    public function setTxtcamp(?string $txtcamp): self
    {
        $this->txtcamp = $txtcamp;

        return $this;
    }

    public function getTitcampEn(): ?string
    {
        return $this->titcampEn;
    }

    public function setTitcampEn(string $titcampEn): self
    {
        $this->titcampEn = $titcampEn;

        return $this;
    }

    public function getCondicionesEn(): ?string
    {
        return $this->condicionesEn;
    }

    public function setCondicionesEn(string $condicionesEn): self
    {
        $this->condicionesEn = $condicionesEn;

        return $this;
    }

    public function getTxtcampEn(): ?string
    {
        return $this->txtcampEn;
    }

    public function setTxtcampEn(?string $txtcampEn): self
    {
        $this->txtcampEn = $txtcampEn;

        return $this;
    }

    public function getContenidoEspecifico(): ?string
    {
        return $this->contenidoEspecifico;
    }

    public function setContenidoEspecifico(?string $contenidoEspecifico): self
    {
        $this->contenidoEspecifico = $contenidoEspecifico;

        return $this;
    }

    public function getContenidoEspecificoDefecto(): ?string
    {
        return $this->contenidoEspecificoDefecto;
    }

    public function setContenidoEspecificoDefecto(?string $contenidoEspecificoDefecto): self
    {
        $this->contenidoEspecificoDefecto = $contenidoEspecificoDefecto;

        return $this;
    }

    public function getComisioncamp(): ?float
    {
        return $this->comisioncamp;
    }

    public function setComisioncamp(float $comisioncamp): self
    {
        $this->comisioncamp = $comisioncamp;

        return $this;
    }

    public function getTxtlanding(): ?string
    {
        return $this->txtlanding;
    }

    public function setTxtlanding(?string $txtlanding): self
    {
        $this->txtlanding = $txtlanding;

        return $this;
    }

    public function getCampaniapublica(): ?int
    {
        return $this->campaniapublica;
    }

    public function setCampaniapublica(?int $campaniapublica): self
    {
        $this->campaniapublica = $campaniapublica;

        return $this;
    }

    public function getActcamp(): ?bool
    {
        return $this->actcamp;
    }

    public function setActcamp(bool $actcamp): self
    {
        $this->actcamp = $actcamp;

        return $this;
    }

    public function getEsVip(): ?bool
    {
        return $this->esVip;
    }

    public function setEsVip(?bool $esVip): self
    {
        $this->esVip = $esVip;

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

    public function getMostrarpublico(): ?bool
    {
        return $this->mostrarpublico;
    }

    public function setMostrarpublico(bool $mostrarpublico): self
    {
        $this->mostrarpublico = $mostrarpublico;

        return $this;
    }

    public function getConnectionApi(): ?string
    {
        return $this->connectionApi;
    }

    public function setConnectionApi(?string $connectionApi): self
    {
        $this->connectionApi = $connectionApi;

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

    public function getIdiomaPrincipal(): ?string
    {
        return $this->idiomaPrincipal;
    }

    public function setIdiomaPrincipal(string $idiomaPrincipal): self
    {
        $this->idiomaPrincipal = $idiomaPrincipal;

        return $this;
    }

    public function getPaises(): ?array
    {
        return $this->paises;
    }

    public function setPaises(?array $paises): self
    {
        $this->paises = $paises;

        return $this;
    }

    public function getCasaIapuestas(): ?int
    {
        return $this->casaIapuestas;
    }

    public function setCasaIapuestas(?int $casaIapuestas): self
    {
        $this->casaIapuestas = $casaIapuestas;

        return $this;
    }

    public function getCrearEnlaces(): ?int
    {
        return $this->crearEnlaces;
    }

    public function setCrearEnlaces(int $crearEnlaces): self
    {
        $this->crearEnlaces = $crearEnlaces;

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

    public function getDeposit(): ?float
    {
        return $this->deposit;
    }

    public function setDeposit(?float $deposit): self
    {
        $this->deposit = $deposit;

        return $this;
    }

    public function getWagering(): ?float
    {
        return $this->wagering;
    }

    public function setWagering(float $wagering): self
    {
        $this->wagering = $wagering;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }


}
