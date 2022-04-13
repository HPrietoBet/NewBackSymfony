<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaginasHtmlCasasapuestas
 *
 * @ORM\Table(name="paginas_html_casasapuestas")
 * @ORM\Entity(repositoryClass="App\Repository\Main\PaginasHTMLCasasDeApuestasRepository")
 */
class PaginasHtmlCasasapuestas
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
     * @ORM\Column(name="id_casa", type="string", length=255, nullable=true)
     */
    private $idCasa;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen_casa", type="string", length=255, nullable=false)
     */
    private $imagenCasa;

    /**
     * @var string
     *
     * @ORM\Column(name="paises_acuerdo", type="string", length=255, nullable=false)
     */
    private $paisesAcuerdo;

    /**
     * @var string
     *
     * @ORM\Column(name="title_es", type="string", length=100, nullable=false)
     */
    private $titleEs;

    /**
     * @var string
     *
     * @ORM\Column(name="description_es", type="string", length=255, nullable=false)
     */
    private $descriptionEs;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_es", type="string", length=100, nullable=false)
     */
    private $tituloEs;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_es", type="text", length=65535, nullable=false)
     */
    private $contenidoEs;

    /**
     * @var string
     *
     * @ORM\Column(name="url_es", type="string", length=100, nullable=false)
     */
    private $urlEs;

    /**
     * @var string
     *
     * @ORM\Column(name="title_pt", type="string", length=100, nullable=false)
     */
    private $titlePt;

    /**
     * @var string
     *
     * @ORM\Column(name="description_pt", type="string", length=255, nullable=false)
     */
    private $descriptionPt;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_pt", type="string", length=100, nullable=false)
     */
    private $tituloPt;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_pt", type="text", length=65535, nullable=false)
     */
    private $contenidoPt;

    /**
     * @var string
     *
     * @ORM\Column(name="url_pt", type="string", length=100, nullable=false)
     */
    private $urlPt;

    /**
     * @var string
     *
     * @ORM\Column(name="title_en", type="string", length=100, nullable=false)
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(name="description_en", type="string", length=255, nullable=false)
     */
    private $descriptionEn;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_en", type="string", length=100, nullable=false)
     */
    private $tituloEn;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_en", type="text", length=65535, nullable=false)
     */
    private $contenidoEn;

    /**
     * @var string
     *
     * @ORM\Column(name="url_en", type="string", length=100, nullable=false)
     */
    private $urlEn;

    /**
     * @var string
     *
     * @ORM\Column(name="title_fr", type="string", length=100, nullable=false)
     */
    private $titleFr;

    /**
     * @var string
     *
     * @ORM\Column(name="description_fr", type="string", length=255, nullable=false)
     */
    private $descriptionFr;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_fr", type="string", length=100, nullable=false)
     */
    private $tituloFr;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_fr", type="text", length=65535, nullable=false)
     */
    private $contenidoFr;

    /**
     * @var string
     *
     * @ORM\Column(name="url_fr", type="string", length=100, nullable=false)
     */
    private $urlFr;

    /**
     * @var string
     *
     * @ORM\Column(name="title_de", type="string", length=100, nullable=false)
     */
    private $titleDe;

    /**
     * @var string
     *
     * @ORM\Column(name="description_de", type="string", length=255, nullable=false)
     */
    private $descriptionDe;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_de", type="string", length=100, nullable=false)
     */
    private $tituloDe;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_de", type="text", length=65535, nullable=false)
     */
    private $contenidoDe;

    /**
     * @var string
     *
     * @ORM\Column(name="url_de", type="string", length=100, nullable=false)
     */
    private $urlDe;

    /**
     * @var string
     *
     * @ORM\Column(name="title_it", type="string", length=100, nullable=false)
     */
    private $titleIt;

    /**
     * @var string
     *
     * @ORM\Column(name="description_it", type="string", length=255, nullable=false)
     */
    private $descriptionIt;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_it", type="string", length=100, nullable=false)
     */
    private $tituloIt;

    /**
     * @var string
     *
     * @ORM\Column(name="contenido_it", type="text", length=65535, nullable=false)
     */
    private $contenidoIt;

    /**
     * @var string
     *
     * @ORM\Column(name="url_it", type="string", length=100, nullable=false)
     */
    private $urlIt;

    /**
     * @var int
     *
     * @ORM\Column(name="activo", type="integer", nullable=false)
     */
    private $activo = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCasa(): ?string
    {
        return $this->idCasa;
    }

    public function setIdCasa(?string $idCasa): self
    {
        $this->idCasa = $idCasa;

        return $this;
    }

    public function getImagenCasa(): ?string
    {
        return $this->imagenCasa;
    }

    public function setImagenCasa(string $imagenCasa): self
    {
        $this->imagenCasa = $imagenCasa;

        return $this;
    }

    public function getPaisesAcuerdo(): ?string
    {
        return $this->paisesAcuerdo;
    }

    public function setPaisesAcuerdo(string $paisesAcuerdo): self
    {
        $this->paisesAcuerdo = $paisesAcuerdo;

        return $this;
    }

    public function getTitleEs(): ?string
    {
        return $this->titleEs;
    }

    public function setTitleEs(string $titleEs): self
    {
        $this->titleEs = $titleEs;

        return $this;
    }

    public function getDescriptionEs(): ?string
    {
        return $this->descriptionEs;
    }

    public function setDescriptionEs(string $descriptionEs): self
    {
        $this->descriptionEs = $descriptionEs;

        return $this;
    }

    public function getTituloEs(): ?string
    {
        return $this->tituloEs;
    }

    public function setTituloEs(string $tituloEs): self
    {
        $this->tituloEs = $tituloEs;

        return $this;
    }

    public function getContenidoEs(): ?string
    {
        return $this->contenidoEs;
    }

    public function setContenidoEs(string $contenidoEs): self
    {
        $this->contenidoEs = $contenidoEs;

        return $this;
    }

    public function getUrlEs(): ?string
    {
        return $this->urlEs;
    }

    public function setUrlEs(string $urlEs): self
    {
        $this->urlEs = $urlEs;

        return $this;
    }

    public function getTitlePt(): ?string
    {
        return $this->titlePt;
    }

    public function setTitlePt(string $titlePt): self
    {
        $this->titlePt = $titlePt;

        return $this;
    }

    public function getDescriptionPt(): ?string
    {
        return $this->descriptionPt;
    }

    public function setDescriptionPt(string $descriptionPt): self
    {
        $this->descriptionPt = $descriptionPt;

        return $this;
    }

    public function getTituloPt(): ?string
    {
        return $this->tituloPt;
    }

    public function setTituloPt(string $tituloPt): self
    {
        $this->tituloPt = $tituloPt;

        return $this;
    }

    public function getContenidoPt(): ?string
    {
        return $this->contenidoPt;
    }

    public function setContenidoPt(string $contenidoPt): self
    {
        $this->contenidoPt = $contenidoPt;

        return $this;
    }

    public function getUrlPt(): ?string
    {
        return $this->urlPt;
    }

    public function setUrlPt(string $urlPt): self
    {
        $this->urlPt = $urlPt;

        return $this;
    }

    public function getTitleEn(): ?string
    {
        return $this->titleEn;
    }

    public function setTitleEn(string $titleEn): self
    {
        $this->titleEn = $titleEn;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->descriptionEn;
    }

    public function setDescriptionEn(string $descriptionEn): self
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    public function getTituloEn(): ?string
    {
        return $this->tituloEn;
    }

    public function setTituloEn(string $tituloEn): self
    {
        $this->tituloEn = $tituloEn;

        return $this;
    }

    public function getContenidoEn(): ?string
    {
        return $this->contenidoEn;
    }

    public function setContenidoEn(string $contenidoEn): self
    {
        $this->contenidoEn = $contenidoEn;

        return $this;
    }

    public function getUrlEn(): ?string
    {
        return $this->urlEn;
    }

    public function setUrlEn(string $urlEn): self
    {
        $this->urlEn = $urlEn;

        return $this;
    }

    public function getTitleFr(): ?string
    {
        return $this->titleFr;
    }

    public function setTitleFr(string $titleFr): self
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    public function getDescriptionFr(): ?string
    {
        return $this->descriptionFr;
    }

    public function setDescriptionFr(string $descriptionFr): self
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    public function getTituloFr(): ?string
    {
        return $this->tituloFr;
    }

    public function setTituloFr(string $tituloFr): self
    {
        $this->tituloFr = $tituloFr;

        return $this;
    }

    public function getContenidoFr(): ?string
    {
        return $this->contenidoFr;
    }

    public function setContenidoFr(string $contenidoFr): self
    {
        $this->contenidoFr = $contenidoFr;

        return $this;
    }

    public function getUrlFr(): ?string
    {
        return $this->urlFr;
    }

    public function setUrlFr(string $urlFr): self
    {
        $this->urlFr = $urlFr;

        return $this;
    }

    public function getTitleDe(): ?string
    {
        return $this->titleDe;
    }

    public function setTitleDe(string $titleDe): self
    {
        $this->titleDe = $titleDe;

        return $this;
    }

    public function getDescriptionDe(): ?string
    {
        return $this->descriptionDe;
    }

    public function setDescriptionDe(string $descriptionDe): self
    {
        $this->descriptionDe = $descriptionDe;

        return $this;
    }

    public function getTituloDe(): ?string
    {
        return $this->tituloDe;
    }

    public function setTituloDe(string $tituloDe): self
    {
        $this->tituloDe = $tituloDe;

        return $this;
    }

    public function getContenidoDe(): ?string
    {
        return $this->contenidoDe;
    }

    public function setContenidoDe(string $contenidoDe): self
    {
        $this->contenidoDe = $contenidoDe;

        return $this;
    }

    public function getUrlDe(): ?string
    {
        return $this->urlDe;
    }

    public function setUrlDe(string $urlDe): self
    {
        $this->urlDe = $urlDe;

        return $this;
    }

    public function getTitleIt(): ?string
    {
        return $this->titleIt;
    }

    public function setTitleIt(string $titleIt): self
    {
        $this->titleIt = $titleIt;

        return $this;
    }

    public function getDescriptionIt(): ?string
    {
        return $this->descriptionIt;
    }

    public function setDescriptionIt(string $descriptionIt): self
    {
        $this->descriptionIt = $descriptionIt;

        return $this;
    }

    public function getTituloIt(): ?string
    {
        return $this->tituloIt;
    }

    public function setTituloIt(string $tituloIt): self
    {
        $this->tituloIt = $tituloIt;

        return $this;
    }

    public function getContenidoIt(): ?string
    {
        return $this->contenidoIt;
    }

    public function setContenidoIt(string $contenidoIt): self
    {
        $this->contenidoIt = $contenidoIt;

        return $this;
    }

    public function getUrlIt(): ?string
    {
        return $this->urlIt;
    }

    public function setUrlIt(string $urlIt): self
    {
        $this->urlIt = $urlIt;

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


}
