<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * FacturacionOpciones
 *
 * @ORM\Table(name="facturacion_opciones")
 * @ORM\Entity(repositoryClass="App\Repository\Main\FacturacionOpcionesRepository")
 */
class FacturacionOpciones
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_fac_opc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFacOpc;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_en", type="string", length=100, nullable=false)
     */
    private $tituloEn;

    public function getIdFacOpc(): ?int
    {
        return $this->idFacOpc;
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

    public function getTituloEn(): ?string
    {
        return $this->tituloEn;
    }

    public function setTituloEn(string $tituloEn): self
    {
        $this->tituloEn = $tituloEn;

        return $this;
    }


}
