<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * CasasDeApuestasBack
 *
 * @ORM\Table(name="casas_de_apuestas_back", indexes={@ORM\Index(name="ix_id_cat", columns={"id_cat"})})
  * @ORM\Entity(repositoryClass="App\Repository\Ggms\CasasDeApuestasBackRepository")
 */
class CasasDeApuestasBack
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_casa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCasa;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cat", type="integer", nullable=false)
     */
    private $idCat;

    /**
     * @var string
     *
     * @ORM\Column(name="id_cas_pais", type="string", length=256, nullable=false)
     */
    private $idCasPais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pais_order", type="string", length=255, nullable=true)
     */
    private $paisOrder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_pagina_html", type="integer", nullable=true)
     */
    private $idPaginaHtml;

    /**
     * @var string
     *
     * @ORM\Column(name="titcasa", type="string", length=60, nullable=false)
     */
    private $titcasa;

    /**
     * @var string
     *
     * @ORM\Column(name="imgcasa", type="string", length=256, nullable=false)
     */
    private $imgcasa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logo_custom", type="string", length=255, nullable=true)
     */
    private $logoCustom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="responsable", type="integer", nullable=true)
     */
    private $responsable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bono", type="string", length=255, nullable=true)
     */
    private $bono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usuario", type="string", length=255, nullable=true)
     */
    private $usuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="metodo_cobro", type="string", length=255, nullable=true)
     */
    private $metodoCobro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="procedimiento_pago", type="string", length=255, nullable=true)
     */
    private $procedimientoPago;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contacto", type="string", length=255, nullable=true)
     */
    private $contacto;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo_feed_cuotas", type="boolean", nullable=false)
     */
    private $activoFeedCuotas = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="feed_cuotas", type="string", length=255, nullable=true)
     */
    private $feedCuotas;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo_feed_streaming", type="boolean", nullable=false)
     */
    private $activoFeedStreaming = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="feed_streaming", type="string", length=255, nullable=true)
     */
    private $feedStreaming;

    /**
     * @var string|null
     *
     * @ORM\Column(name="baseline", type="string", length=255, nullable=true)
     */
    private $baseline;

    /**
     * @var bool
     *
     * @ORM\Column(name="requiere_factura", type="boolean", nullable=false)
     */
    private $requiereFactura = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="datos_facturacion", type="text", length=65535, nullable=true)
     */
    private $datosFacturacion;

    /**
     * @var bool
     *
     * @ORM\Column(name="actcasa", type="boolean", nullable=false)
     */
    private $actcasa;

    public function getIdCasa(): ?int
    {
        return $this->idCasa;
    }

    public function getIdCat(): ?int
    {
        return $this->idCat;
    }

    public function setIdCat(int $idCat): self
    {
        $this->idCat = $idCat;

        return $this;
    }

    public function getIdCasPais(): ?string
    {
        return $this->idCasPais;
    }

    public function setIdCasPais(string $idCasPais): self
    {
        $this->idCasPais = $idCasPais;

        return $this;
    }

    public function getPaisOrder(): ?string
    {
        return $this->paisOrder;
    }

    public function setPaisOrder(?string $paisOrder): self
    {
        $this->paisOrder = $paisOrder;

        return $this;
    }

    public function getIdPaginaHtml(): ?int
    {
        return $this->idPaginaHtml;
    }

    public function setIdPaginaHtml(?int $idPaginaHtml): self
    {
        $this->idPaginaHtml = $idPaginaHtml;

        return $this;
    }

    public function getTitcasa(): ?string
    {
        return $this->titcasa;
    }

    public function setTitcasa(string $titcasa): self
    {
        $this->titcasa = $titcasa;

        return $this;
    }

    public function getImgcasa(): ?string
    {
        return $this->imgcasa;
    }

    public function setImgcasa(string $imgcasa): self
    {
        $this->imgcasa = $imgcasa;

        return $this;
    }

    public function getLogoCustom(): ?string
    {
        return $this->logoCustom;
    }

    public function setLogoCustom(?string $logoCustom): self
    {
        $this->logoCustom = $logoCustom;

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

    public function getBono(): ?string
    {
        return $this->bono;
    }

    public function setBono(?string $bono): self
    {
        $this->bono = $bono;

        return $this;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): self
    {
        $this->usuario = $usuario;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getMetodoCobro(): ?string
    {
        return $this->metodoCobro;
    }

    public function setMetodoCobro(?string $metodoCobro): self
    {
        $this->metodoCobro = $metodoCobro;

        return $this;
    }

    public function getProcedimientoPago(): ?string
    {
        return $this->procedimientoPago;
    }

    public function setProcedimientoPago(?string $procedimientoPago): self
    {
        $this->procedimientoPago = $procedimientoPago;

        return $this;
    }

    public function getContacto(): ?string
    {
        return $this->contacto;
    }

    public function setContacto(?string $contacto): self
    {
        $this->contacto = $contacto;

        return $this;
    }

    public function getActivoFeedCuotas(): ?bool
    {
        return $this->activoFeedCuotas;
    }

    public function setActivoFeedCuotas(bool $activoFeedCuotas): self
    {
        $this->activoFeedCuotas = $activoFeedCuotas;

        return $this;
    }

    public function getFeedCuotas(): ?string
    {
        return $this->feedCuotas;
    }

    public function setFeedCuotas(?string $feedCuotas): self
    {
        $this->feedCuotas = $feedCuotas;

        return $this;
    }

    public function getActivoFeedStreaming(): ?bool
    {
        return $this->activoFeedStreaming;
    }

    public function setActivoFeedStreaming(bool $activoFeedStreaming): self
    {
        $this->activoFeedStreaming = $activoFeedStreaming;

        return $this;
    }

    public function getFeedStreaming(): ?string
    {
        return $this->feedStreaming;
    }

    public function setFeedStreaming(?string $feedStreaming): self
    {
        $this->feedStreaming = $feedStreaming;

        return $this;
    }

    public function getBaseline(): ?string
    {
        return $this->baseline;
    }

    public function setBaseline(?string $baseline): self
    {
        $this->baseline = $baseline;

        return $this;
    }

    public function getRequiereFactura(): ?bool
    {
        return $this->requiereFactura;
    }

    public function setRequiereFactura(bool $requiereFactura): self
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

    public function getActcasa(): ?bool
    {
        return $this->actcasa;
    }

    public function setActcasa(bool $actcasa): self
    {
        $this->actcasa = $actcasa;

        return $this;
    }


}
