<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * CuotasPageUsuario
 *
 * @ORM\Table(name="cuotas_page_usuario", uniqueConstraints={@ORM\UniqueConstraint(name="unq_page_cuota", columns={"clu_page_id", "clu_cuota_id"})}, indexes={@ORM\Index(name="ix_clu_cuota_id", columns={"clu_cuota_id"}), @ORM\Index(name="ix_clu_page_id", columns={"clu_page_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\CuotasPageUsuarioRepository")
 */
class CuotasPageUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="clu_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cluId;

    /**
     * @var int
     *
     * @ORM\Column(name="clu_page_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $cluPageId = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="clu_cuota_id", type="string", length=255, nullable=true)
     */
    private $cluCuotaId;

    public function getCluId(): ?int
    {
        return $this->cluId;
    }

    public function getCluPageId(): ?int
    {
        return $this->cluPageId;
    }

    public function setCluPageId(int $cluPageId): self
    {
        $this->cluPageId = $cluPageId;

        return $this;
    }

    public function getCluCuotaId(): ?string
    {
        return $this->cluCuotaId;
    }

    public function setCluCuotaId(?string $cluCuotaId): self
    {
        $this->cluCuotaId = $cluCuotaId;

        return $this;
    }


}
