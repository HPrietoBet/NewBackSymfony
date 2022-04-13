<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * DbVersion
 *
 * @ORM\Table(name="db_version")
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\DBVersionRepository")
 */
class DbVersion
{
    /**
     * @var int
     *
     * @ORM\Column(name="idversion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idversion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="VERSION", type="integer", nullable=true)
     */
    private $version;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=true)
     */
    private $timestamp;

    public function getIdversion(): ?int
    {
        return $this->idversion;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(?int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(?\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }


}
