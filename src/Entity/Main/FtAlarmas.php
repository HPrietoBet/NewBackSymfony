<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * FtAlarmas
 *
 * @ORM\Table(name="ft_alarmas", uniqueConstraints={@ORM\UniqueConstraint(name="unq_alr_unique_key", columns={"alr_unique_key"})}, indexes={@ORM\Index(name="ix_date", columns={"alr_date"})})
 * @ORM\Entity(repositoryClass="App\Repository\Main\FtAlarmasRepository")
 */
class FtAlarmas
{
    /**
     * @var int
     *
     * @ORM\Column(name="alr_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $alrId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="alr_date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $alrDate = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="alr_type", type="string", length=10, nullable=true)
     */
    private $alrType = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="alr_data", type="text", length=16777215, nullable=true)
     */
    private $alrData;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="alr_view", type="boolean", nullable=true)
     */
    private $alrView = '0';

    /**
     * @var float|null
     *
     * @ORM\Column(name="alr_umbral", type="float", precision=5, scale=2, nullable=true)
     */
    private $alrUmbral;

    /**
     * @var string|null
     *
     * @ORM\Column(name="alr_unique_key", type="string", length=64, nullable=true)
     */
    private $alrUniqueKey = '';

    public function getAlrId(): ?int
    {
        return $this->alrId;
    }

    public function getAlrDate(): ?\DateTimeInterface
    {
        return $this->alrDate;
    }

    public function setAlrDate(\DateTimeInterface $alrDate): self
    {
        $this->alrDate = $alrDate;

        return $this;
    }

    public function getAlrType(): ?string
    {
        return $this->alrType;
    }

    public function setAlrType(?string $alrType): self
    {
        $this->alrType = $alrType;

        return $this;
    }

    public function getAlrData(): ?string
    {
        return $this->alrData;
    }

    public function setAlrData(?string $alrData): self
    {
        $this->alrData = $alrData;

        return $this;
    }

    public function getAlrView(): ?bool
    {
        return $this->alrView;
    }

    public function setAlrView(?bool $alrView): self
    {
        $this->alrView = $alrView;

        return $this;
    }

    public function getAlrUmbral(): ?float
    {
        return $this->alrUmbral;
    }

    public function setAlrUmbral(?float $alrUmbral): self
    {
        $this->alrUmbral = $alrUmbral;

        return $this;
    }

    public function getAlrUniqueKey(): ?string
    {
        return $this->alrUniqueKey;
    }

    public function setAlrUniqueKey(?string $alrUniqueKey): self
    {
        $this->alrUniqueKey = $alrUniqueKey;

        return $this;
    }


}
