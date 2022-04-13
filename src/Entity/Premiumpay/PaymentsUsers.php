<?php

namespace App\Entity\Premiumpay;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentsUsers
 *
 * @ORM\Table(name="payments_users", uniqueConstraints={@ORM\UniqueConstraint(name="unq_pu_id_user_id", columns={"pa_pu_id", "pu_iduser_premiumpay"})}, indexes={@ORM\Index(name="ix_pu_id", columns={"pa_pu_id"}), @ORM\Index(name="ix_userid", columns={"pu_iduser_premiumpay"})})
 * @ORM\Entity(repositoryClass="App\Repository\Premiumpay\PaymentsUsersRepository")
 */
class PaymentsUsers
{
    /**
     * @var int
     *
     * @ORM\Column(name="pu_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $puId;

    /**
     * @var int
     *
     * @ORM\Column(name="pa_pu_id", type="smallint", nullable=false)
     */
    private $paPuId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="pu_iduser_premiumpay", type="integer", nullable=false)
     */
    private $puIduserPremiumpay = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="active", type="smallint", nullable=false, options={"default"="1"})
     */
    private $active = '1';

    public function getPuId(): ?int
    {
        return $this->puId;
    }

    public function getPaPuId(): ?int
    {
        return $this->paPuId;
    }

    public function setPaPuId(int $paPuId): self
    {
        $this->paPuId = $paPuId;

        return $this;
    }

    public function getPuIduserPremiumpay(): ?int
    {
        return $this->puIduserPremiumpay;
    }

    public function setPuIduserPremiumpay(int $puIduserPremiumpay): self
    {
        $this->puIduserPremiumpay = $puIduserPremiumpay;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): self
    {
        $this->active = $active;

        return $this;
    }


}
