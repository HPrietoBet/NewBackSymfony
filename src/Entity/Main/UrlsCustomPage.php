<?php

namespace App\Entity\Main;

use Doctrine\ORM\Mapping as ORM;

/**
 * UrlsCustomPage
 *
 * @ORM\Table(name="urls_custom_page")
 * @ORM\Entity(repositoryClass="App\Repository\Main\UrlCustomPageRepository")
 */
class UrlsCustomPage
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
     * @var int
     *
     * @ORM\Column(name="id_custom_page", type="integer", nullable=false)
     */
    private $idCustomPage;

    /**
     * @var int
     *
     * @ORM\Column(name="id_campania", type="integer", nullable=false)
     */
    private $idCampania;

    /**
     * @var int
     *
     * @ORM\Column(name="id_enlace", type="integer", nullable=false)
     */
    private $idEnlace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso_pais", type="string", length=255, nullable=true)
     */
    private $isoPais;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCustomPage(): ?int
    {
        return $this->idCustomPage;
    }

    public function setIdCustomPage(int $idCustomPage): self
    {
        $this->idCustomPage = $idCustomPage;

        return $this;
    }

    public function getIdCampania(): ?int
    {
        return $this->idCampania;
    }

    public function setIdCampania(int $idCampania): self
    {
        $this->idCampania = $idCampania;

        return $this;
    }

    public function getIdEnlace(): ?int
    {
        return $this->idEnlace;
    }

    public function setIdEnlace(int $idEnlace): self
    {
        $this->idEnlace = $idEnlace;

        return $this;
    }

    public function getIsoPais(): ?string
    {
        return $this->isoPais;
    }

    public function setIsoPais(?string $isoPais): self
    {
        $this->isoPais = $isoPais;

        return $this;
    }


}
