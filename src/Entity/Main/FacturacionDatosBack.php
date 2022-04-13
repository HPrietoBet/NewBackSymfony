<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacturacionDatosBack
 *
 * @ORM\Table(name="facturacion_datos_back", indexes={@ORM\Index(name="ix_id_usu_fac", columns={"id_usu_fac"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\FacturacionDatosBackRepository")
 */
class FacturacionDatosBack
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
     * @ORM\Column(name="id_usu_fac", type="integer", nullable=false)
     */
    private $idUsuFac;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tipo", type="string", length=20, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=256, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_empresa", type="string", length=256, nullable=true)
     */
    private $nombreEmpresa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=25, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=256, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="string", length=256, nullable=false)
     */
    private $poblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=256, nullable=false)
     */
    private $provincia;

    /**
     * @var string
     *
     * @ORM\Column(name="cpostal", type="string", length=12, nullable=false)
     */
    private $cpostal;

    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=60, nullable=false)
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=256, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=256, nullable=false)
     */
    private $pais;

    /**
     * @var int
     *
     * @ORM\Column(name="id_pago", type="integer", nullable=false)
     */
    private $idPago;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcuenta", type="string", length=60, nullable=true)
     */
    private $numcuenta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numcuentabanco", type="string", length=255, nullable=true)
     */
    private $numcuentabanco;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre_completo_pago", type="string", length=255, nullable=true)
     */
    private $nombreCompletoPago;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transferencia_swift", type="string", length=11, nullable=true)
     */
    private $transferenciaSwift;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transferencia_dirrecion_banco", type="string", length=255, nullable=true)
     */
    private $transferenciaDirrecionBanco;

    /**
     * @var string
     *
     * @ORM\Column(name="dni_fac", type="string", length=256, nullable=false)
     */
    private $dniFac;

    /**
     * @var bool
     *
     * @ORM\Column(name="control", type="boolean", nullable=false, options={"comment"="Nueva logica: 10 = OK, 11 = PENDIENTE, 12 = ERROR"})
     */
    private $control;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date", nullable=false)
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_caducidad", type="date", nullable=false)
     */
    private $fechaCaducidad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pendiente", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $pendiente;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo", type="decimal", precision=10, scale=2, nullable=false, options={"default"="0.00"})
     */
    private $saldo = '0.00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="docfrontal", type="string", length=255, nullable=true)
     */
    private $docfrontal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="docreverso", type="string", length=255, nullable=true)
     */
    private $docreverso;

    /**
     * @var float|null
     *
     * @ORM\Column(name="pendiente_pagar", type="float", precision=10, scale=0, nullable=true)
     */
    private $pendientePagar;

    /**
     * @var float|null
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var float|null
     *
     * @ORM\Column(name="pagado", type="float", precision=10, scale=0, nullable=true)
     */
    private $pagado;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="mostrar_adminlogin", type="boolean", nullable=true)
     */
    private $mostrarAdminlogin = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="multifacturas", type="boolean", nullable=false)
     */
    private $multifacturas = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="multifacturas_subir", type="boolean", nullable=false)
     */
    private $multifacturasSubir = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuFac(): ?int
    {
        return $this->idUsuFac;
    }

    public function setIdUsuFac(int $idUsuFac): self
    {
        $this->idUsuFac = $idUsuFac;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNombreEmpresa(): ?string
    {
        return $this->nombreEmpresa;
    }

    public function setNombreEmpresa(?string $nombreEmpresa): self
    {
        $this->nombreEmpresa = $nombreEmpresa;

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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getPoblacion(): ?string
    {
        return $this->poblacion;
    }

    public function setPoblacion(string $poblacion): self
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getCpostal(): ?string
    {
        return $this->cpostal;
    }

    public function setCpostal(string $cpostal): self
    {
        $this->cpostal = $cpostal;

        return $this;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): self
    {
        $this->nif = $nif;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getIdPago(): ?int
    {
        return $this->idPago;
    }

    public function setIdPago(int $idPago): self
    {
        $this->idPago = $idPago;

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

    public function getNumcuentabanco(): ?string
    {
        return $this->numcuentabanco;
    }

    public function setNumcuentabanco(?string $numcuentabanco): self
    {
        $this->numcuentabanco = $numcuentabanco;

        return $this;
    }

    public function getNombreCompletoPago(): ?string
    {
        return $this->nombreCompletoPago;
    }

    public function setNombreCompletoPago(?string $nombreCompletoPago): self
    {
        $this->nombreCompletoPago = $nombreCompletoPago;

        return $this;
    }

    public function getTransferenciaSwift(): ?string
    {
        return $this->transferenciaSwift;
    }

    public function setTransferenciaSwift(?string $transferenciaSwift): self
    {
        $this->transferenciaSwift = $transferenciaSwift;

        return $this;
    }

    public function getTransferenciaDirrecionBanco(): ?string
    {
        return $this->transferenciaDirrecionBanco;
    }

    public function setTransferenciaDirrecionBanco(?string $transferenciaDirrecionBanco): self
    {
        $this->transferenciaDirrecionBanco = $transferenciaDirrecionBanco;

        return $this;
    }

    public function getDniFac(): ?string
    {
        return $this->dniFac;
    }

    public function setDniFac(string $dniFac): self
    {
        $this->dniFac = $dniFac;

        return $this;
    }

    public function getControl(): ?bool
    {
        return $this->control;
    }

    public function setControl(bool $control): self
    {
        $this->control = $control;

        return $this;
    }

    public function getFechaAlta(): ?\DateTimeInterface
    {
        return $this->fechaAlta;
    }

    public function setFechaAlta(\DateTimeInterface $fechaAlta): self
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    public function getFechaCaducidad(): ?\DateTimeInterface
    {
        return $this->fechaCaducidad;
    }

    public function setFechaCaducidad(\DateTimeInterface $fechaCaducidad): self
    {
        $this->fechaCaducidad = $fechaCaducidad;

        return $this;
    }

    public function getPendiente(): ?string
    {
        return $this->pendiente;
    }

    public function setPendiente(?string $pendiente): self
    {
        $this->pendiente = $pendiente;

        return $this;
    }

    public function getSaldo(): ?string
    {
        return $this->saldo;
    }

    public function setSaldo(string $saldo): self
    {
        $this->saldo = $saldo;

        return $this;
    }

    public function getDocfrontal(): ?string
    {
        return $this->docfrontal;
    }

    public function setDocfrontal(?string $docfrontal): self
    {
        $this->docfrontal = $docfrontal;

        return $this;
    }

    public function getDocreverso(): ?string
    {
        return $this->docreverso;
    }

    public function setDocreverso(?string $docreverso): self
    {
        $this->docreverso = $docreverso;

        return $this;
    }

    public function getPendientePagar(): ?float
    {
        return $this->pendientePagar;
    }

    public function setPendientePagar(?float $pendientePagar): self
    {
        $this->pendientePagar = $pendientePagar;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getPagado(): ?float
    {
        return $this->pagado;
    }

    public function setPagado(?float $pagado): self
    {
        $this->pagado = $pagado;

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

    public function getMultifacturas(): ?bool
    {
        return $this->multifacturas;
    }

    public function setMultifacturas(bool $multifacturas): self
    {
        $this->multifacturas = $multifacturas;

        return $this;
    }

    public function getMultifacturasSubir(): ?bool
    {
        return $this->multifacturasSubir;
    }

    public function setMultifacturasSubir(bool $multifacturasSubir): self
    {
        $this->multifacturasSubir = $multifacturasSubir;

        return $this;
    }


}
