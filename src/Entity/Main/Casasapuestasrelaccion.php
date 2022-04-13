<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * Casasapuestasrelaccion
 *
 * @ORM\Table(name="casasapuestasrelaccion", uniqueConstraints={@ORM\UniqueConstraint(name="unq_cuotas_back", columns={"rel_cuotas_casa_id", "rel_campania_id"})}, indexes={@ORM\Index(name="ix_rel_back_id", columns={"rel_campania_id"}), @ORM\Index(name="ix_rel_cuotas_id", columns={"rel_cuotas_casa_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CasasApuestasRelacionRepository")
 */
class Casasapuestasrelaccion
{
    /**
     * @var int
     *
     * @ORM\Column(name="rel_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $relId;

    /**
     * @var int
     *
     * @ORM\Column(name="rel_cuotas_casa_id", type="integer", nullable=false)
     */
    private $relCuotasCasaId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rel_campania_id", type="integer", nullable=false)
     */
    private $relCampaniaId = '0';

    public function getRelId(): ?int
    {
        return $this->relId;
    }

    public function getRelCuotasCasaId(): ?int
    {
        return $this->relCuotasCasaId;
    }

    public function setRelCuotasCasaId(int $relCuotasCasaId): self
    {
        $this->relCuotasCasaId = $relCuotasCasaId;

        return $this;
    }

    public function getRelCampaniaId(): ?int
    {
        return $this->relCampaniaId;
    }

    public function setRelCampaniaId(int $relCampaniaId): self
    {
        $this->relCampaniaId = $relCampaniaId;

        return $this;
    }


}
