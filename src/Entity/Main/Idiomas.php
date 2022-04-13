<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idiomas
 *
 * @ORM\Table(name="idiomas")
 * @ORM\Entity(repositoryClass="App\Repository\Main\IdiomasRepository")
 */
class Idiomas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_idioma", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIdioma;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=false)
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=60, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="img_lang", type="string", length=256, nullable=false)
     */
    private $imgLang;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible_admin", type="boolean", nullable=false)
     */
    private $visibleAdmin = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="visible_publica", type="boolean", nullable=false)
     */
    private $visiblePublica = '0';

    public function getIdIdioma(): ?int
    {
        return $this->idIdioma;
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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getImgLang(): ?string
    {
        return $this->imgLang;
    }

    public function setImgLang(string $imgLang): self
    {
        $this->imgLang = $imgLang;

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

    public function getVisibleAdmin(): ?bool
    {
        return $this->visibleAdmin;
    }

    public function setVisibleAdmin(bool $visibleAdmin): self
    {
        $this->visibleAdmin = $visibleAdmin;

        return $this;
    }

    public function getVisiblePublica(): ?bool
    {
        return $this->visiblePublica;
    }

    public function setVisiblePublica(bool $visiblePublica): self
    {
        $this->visiblePublica = $visiblePublica;

        return $this;
    }


}
