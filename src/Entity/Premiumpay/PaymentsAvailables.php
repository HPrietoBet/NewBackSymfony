<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentsAvailables
 *
 * @ORM\Table(name="payments_availables")
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\PaymentsAvaliablesRepository")
 */
class PaymentsAvailables
{
    /**
     * @var int
     *
     * @ORM\Column(name="pa_id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $paId;

    /**
     * @var string
     *
     * @ORM\Column(name="pa_type", type="string", length=100, nullable=false)
     */
    private $paType = '';

    /**
     * @var int
     *
     * @ORM\Column(name="pa_active", type="smallint", nullable=false, options={"default"="1"})
     */
    private $paActive = '1';

    public function getPaId(): ?int
    {
        return $this->paId;
    }

    public function getPaType(): ?string
    {
        return $this->paType;
    }

    public function setPaType(string $paType): self
    {
        $this->paType = $paType;

        return $this;
    }

    public function getPaActive(): ?int
    {
        return $this->paActive;
    }

    public function setPaActive(int $paActive): self
    {
        $this->paActive = $paActive;

        return $this;
    }


}
