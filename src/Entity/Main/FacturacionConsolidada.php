<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacturacionConsolidada
 *
 * @ORM\Table(name="facturacion_consolidada", uniqueConstraints={@ORM\UniqueConstraint(name="unq_month_year_casa", columns={"month", "year", "id_casa"})}, indexes={@ORM\Index(name="ix_id_casa", columns={"id_casa"}), @ORM\Index(name="ix_month", columns={"month"}), @ORM\Index(name="ix_cobrado", columns={"cobrado"}), @ORM\Index(name="ix_year", columns={"year"}), @ORM\Index(name="ix_estado", columns={"estado"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\FacturacionConsolidadaRepository")
 */
class FacturacionConsolidada
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
     * @ORM\Column(name="year", type="smallint", nullable=false)
     */
    private $year;

    /**
     * @var int
     *
     * @ORM\Column(name="month", type="smallint", nullable=false)
     */
    private $month;

    /**
     * @var int
     *
     * @ORM\Column(name="id_casa", type="integer", nullable=false)
     */
    private $idCasa;

    /**
     * @var string
     *
     * @ORM\Column(name="casa", type="string", length=255, nullable=false)
     */
    private $casa;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=50, nullable=false)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="campanias_activas", type="string", length=200, nullable=false)
     */
    private $campaniasActivas;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3, nullable=false, options={"default"="EUR"})
     */
    private $currency = 'EUR';

    /**
     * @var string
     *
     * @ORM\Column(name="impuestos", type="decimal", precision=5, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $impuestos = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_bet", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $comBet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_cpa", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $comCpa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_rs", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $comRs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_ff", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $comFf;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_bookie", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $comBookie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_total", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $comTotal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="balance", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $balance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="margen_beneficio", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $margenBeneficio;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="requiere_factura", type="boolean", nullable=true)
     */
    private $requiereFactura;

    /**
     * @var string|null
     *
     * @ORM\Column(name="datos_facturacion", type="string", length=1024, nullable=true)
     */
    private $datosFacturacion;

    /**
     * @var bool
     *
     * @ORM\Column(name="cobrado", type="boolean", nullable=false)
     */
    private $cobrado = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fecha_cobro", type="string", nullable=true)
     */
    private $fechaCobro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comentarios", type="string", length=255, nullable=true)
     */
    private $comentarios;

    /**
     * @var string
     *
     * @ORM\Column(name="factura", type="string", length=255, nullable=false)
     */
    private $factura = '';

    /**
     * @var int
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="created", type="string", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="modify", type="string", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $modify = 'CURRENT_TIMESTAMP';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(int $month): self
    {
        $this->month = $month;

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

    public function getCasa(): ?string
    {
        return $this->casa;
    }

    public function setCasa(string $casa): self
    {
        $this->casa = $casa;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getCampaniasActivas(): ?string
    {
        return $this->campaniasActivas;
    }

    public function setCampaniasActivas(string $campaniasActivas): self
    {
        $this->campaniasActivas = $campaniasActivas;

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

    public function getImpuestos(): ?string
    {
        return $this->impuestos;
    }

    public function setImpuestos(string $impuestos): self
    {
        $this->impuestos = $impuestos;

        return $this;
    }

    public function getComBet(): ?string
    {
        return $this->comBet;
    }

    public function setComBet(?string $comBet): self
    {
        $this->comBet = $comBet;

        return $this;
    }

    public function getComCpa(): ?string
    {
        return $this->comCpa;
    }

    public function setComCpa(?string $comCpa): self
    {
        $this->comCpa = $comCpa;

        return $this;
    }

    public function getComRs(): ?string
    {
        return $this->comRs;
    }

    public function setComRs(?string $comRs): self
    {
        $this->comRs = $comRs;

        return $this;
    }

    public function getComFf(): ?string
    {
        return $this->comFf;
    }

    public function setComFf(?string $comFf): self
    {
        $this->comFf = $comFf;

        return $this;
    }

    public function getComBookie(): ?string
    {
        return $this->comBookie;
    }

    public function setComBookie(?string $comBookie): self
    {
        $this->comBookie = $comBookie;

        return $this;
    }

    public function getComTotal(): ?string
    {
        return $this->comTotal;
    }

    public function setComTotal(?string $comTotal): self
    {
        $this->comTotal = $comTotal;

        return $this;
    }

    public function getBalance(): ?string
    {
        return $this->balance;
    }

    public function setBalance(?string $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getMargenBeneficio(): ?string
    {
        return $this->margenBeneficio;
    }

    public function setMargenBeneficio(?string $margenBeneficio): self
    {
        $this->margenBeneficio = $margenBeneficio;

        return $this;
    }

    public function getRequiereFactura(): ?bool
    {
        return $this->requiereFactura;
    }

    public function setRequiereFactura(?bool $requiereFactura): self
    {
        $this->requiereFactura = $requiereFactura;

        return $this;
    }

    public function getDatosFacturacion(): ?string
    {
        return $this->datosFacturacion;
    }

    public function setDatosFacturacion(?string $datosFacturacion): self
    {
        $this->datosFacturacion = $datosFacturacion;

        return $this;
    }

    public function getCobrado(): ?bool
    {
        return $this->cobrado;
    }

    public function setCobrado(bool $cobrado): self
    {
        $this->cobrado = $cobrado;

        return $this;
    }

    public function getFechaCobro(): ?string
    {
        return $this->fechaCobro;
    }

    public function setFechaCobro(?string $fechaCobro): self
    {
        $this->fechaCobro = $fechaCobro;

        return $this;
    }

    public function getComentarios(): ?string
    {
        return $this->comentarios;
    }

    public function setComentarios(?string $comentarios): self
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    public function getFactura(): ?string
    {
        return $this->factura;
    }

    public function setFactura(string $factura): self
    {
        $this->factura = $factura;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCreated(): ?string
    {
        return $this->created;
    }

    public function setCreated(string $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getModify(): ?string
    {
        return $this->modify;
    }

    public function setModify(string $modify): self
    {
        $this->modify = $modify;

        return $this;
    }


}
