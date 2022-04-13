<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sorteos
 *
 * @ORM\Table(name="sorteos")
 * @ORM\Entity(repositoryClass="App\Repository\Main\SorteosRepository")
 */
class Sorteos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_sorteo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSorteo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreusuario", type="string", length=60, nullable=false)
     */
    private $nombreusuario;

    /**
     * @var int
     *
     * @ORM\Column(name="numerosorteo", type="integer", nullable=false)
     */
    private $numerosorteo;

    public function getIdSorteo(): ?int
    {
        return $this->idSorteo;
    }

    public function getNombreusuario(): ?string
    {
        return $this->nombreusuario;
    }

    public function setNombreusuario(string $nombreusuario): self
    {
        $this->nombreusuario = $nombreusuario;

        return $this;
    }

    public function getNumerosorteo(): ?int
    {
        return $this->numerosorteo;
    }

    public function setNumerosorteo(int $numerosorteo): self
    {
        $this->numerosorteo = $numerosorteo;

        return $this;
    }


}
