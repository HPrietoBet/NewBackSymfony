<?php

namespace App\Entity\Ggms;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaniasEnlacesPosicion
 *
 * @ORM\Table(name="campanias_enlaces_posicion", indexes={@ORM\Index(name="ix_pos", columns={"cep_pos"}), @ORM\Index(name="ix_camp_usuario", columns={"cep_id_camp_usuario"})})
  * @ORM\Entity(repositoryClass="App\Repository\Ggms\CampaniasEnlacesPosicionRepository")
 */
class CampaniasEnlacesPosicion
{
    /**
     * @var int
     *
     * @ORM\Column(name="cep_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cepId;

    /**
     * @var int
     *
     * @ORM\Column(name="cep_id_camp_usuario", type="integer", nullable=false)
     */
    private $cepIdCampUsuario = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cep_nombre", type="string", length=150, nullable=false)
     */
    private $cepNombre = '';

    /**
     * @var int
     *
     * @ORM\Column(name="cep_pos", type="integer", nullable=false)
     */
    private $cepPos = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cep_extra", type="string", length=5, nullable=false, options={"default"="A"})
     */
    private $cepExtra = 'A';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cep_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $cepDate = 'CURRENT_TIMESTAMP';

    public function getCepId(): ?int
    {
        return $this->cepId;
    }

    public function getCepIdCampUsuario(): ?int
    {
        return $this->cepIdCampUsuario;
    }

    public function setCepIdCampUsuario(int $cepIdCampUsuario): self
    {
        $this->cepIdCampUsuario = $cepIdCampUsuario;

        return $this;
    }

    public function getCepNombre(): ?string
    {
        return $this->cepNombre;
    }

    public function setCepNombre(string $cepNombre): self
    {
        $this->cepNombre = $cepNombre;

        return $this;
    }

    public function getCepPos(): ?int
    {
        return $this->cepPos;
    }

    public function setCepPos(int $cepPos): self
    {
        $this->cepPos = $cepPos;

        return $this;
    }

    public function getCepExtra(): ?string
    {
        return $this->cepExtra;
    }

    public function setCepExtra(string $cepExtra): self
    {
        $this->cepExtra = $cepExtra;

        return $this;
    }

    public function getCepDate(): ?\DateTimeInterface
    {
        return $this->cepDate;
    }

    public function setCepDate(\DateTimeInterface $cepDate): self
    {
        $this->cepDate = $cepDate;

        return $this;
    }


}
