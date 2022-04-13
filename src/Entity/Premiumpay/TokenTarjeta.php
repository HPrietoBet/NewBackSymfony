<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * TokenTarjeta
 *
 * @ORM\Table(name="token_tarjeta", indexes={@ORM\Index(name="fk_token_tarjeta_user_premiumpay1_idx", columns={"user_premiumpay_iduser_premiumpay"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\TokenTarjetasRepository")
 */
class TokenTarjeta
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtoken_tarjeta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtokenTarjeta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cardnumber", type="string", length=45, nullable=true)
     */
    private $cardnumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="token", type="string", length=128, nullable=true)
     */
    private $token;

    /**
     * @var string|null
     *
     * @ORM\Column(name="expiry", type="string", length=45, nullable=true)
     */
    private $expiry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="card_brand", type="string", length=45, nullable=true)
     */
    private $cardBrand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cof_txnid", type="string", length=45, nullable=true)
     */
    private $cofTxnid;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="preferida", type="boolean", nullable=true)
     */
    private $preferida = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true, options={"default"="1"})
     */
    private $activo = true;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ts_registered", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $tsRegistered = 'CURRENT_TIMESTAMP';

    /**
     * @var \UserPremiumpay
     *
     * @ORM\ManyToOne(targetEntity="UserPremiumpay")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_premiumpay_iduser_premiumpay", referencedColumnName="iduser_premiumpay")
     * })
     */
    private $userPremiumpayIduserPremiumpay;

    public function getIdtokenTarjeta(): ?int
    {
        return $this->idtokenTarjeta;
    }

    public function getCardnumber(): ?string
    {
        return $this->cardnumber;
    }

    public function setCardnumber(?string $cardnumber): self
    {
        $this->cardnumber = $cardnumber;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getExpiry(): ?string
    {
        return $this->expiry;
    }

    public function setExpiry(?string $expiry): self
    {
        $this->expiry = $expiry;

        return $this;
    }

    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    public function setCardBrand(?string $cardBrand): self
    {
        $this->cardBrand = $cardBrand;

        return $this;
    }

    public function getCofTxnid(): ?string
    {
        return $this->cofTxnid;
    }

    public function setCofTxnid(?string $cofTxnid): self
    {
        $this->cofTxnid = $cofTxnid;

        return $this;
    }

    public function getPreferida(): ?bool
    {
        return $this->preferida;
    }

    public function setPreferida(?bool $preferida): self
    {
        $this->preferida = $preferida;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getTsRegistered(): ?\DateTimeInterface
    {
        return $this->tsRegistered;
    }

    public function setTsRegistered(?\DateTimeInterface $tsRegistered): self
    {
        $this->tsRegistered = $tsRegistered;

        return $this;
    }

    public function getUserPremiumpayIduserPremiumpay(): ?UserPremiumpay
    {
        return $this->userPremiumpayIduserPremiumpay;
    }

    public function setUserPremiumpayIduserPremiumpay(?UserPremiumpay $userPremiumpayIduserPremiumpay): self
    {
        $this->userPremiumpayIduserPremiumpay = $userPremiumpayIduserPremiumpay;

        return $this;
    }


}
