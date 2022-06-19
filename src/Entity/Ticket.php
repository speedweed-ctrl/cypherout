<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("post:read")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Groups("post:read")
     */
    private $Day;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("post:read")
     */
    private $is_done;

    /**
     * @ORM\ManyToOne(targetEntity=Administration::class, inversedBy="tickets")
     * @Groups("post:read")
     */
    private $Administration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->Day;
    }

    public function setDay(\DateTimeInterface $Day): self
    {
        $this->Day = $Day;

        return $this;
    }

    public function getIsDone(): ?bool
    {
        return $this->is_done;
    }

    public function setIsDone(bool $is_done): self
    {
        $this->is_done = $is_done;

        return $this;
    }

    public function getAdministration(): ?Administration
    {
        return $this->Administration;
    }

    public function setAdministration(?Administration $Administration): self
    {
        $this->Administration = $Administration;

        return $this;
    }
}
