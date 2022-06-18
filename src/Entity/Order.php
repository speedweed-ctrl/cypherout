<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Order_Description;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity=Ticket::class, cascade={"persist", "remove"})
     */
    private $ticket;

    /**
     * @ORM\ManyToOne(targetEntity=Worker::class, inversedBy="orders")
     */
    private $Worker;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDescription(): ?string
    {
        return $this->Order_Description;
    }

    public function setOrderDescription(string $Order_Description): self
    {
        $this->Order_Description = $Order_Description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTicket(): ?Ticket
    {
        return $this->ticket;
    }

    public function setTicket(?Ticket $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }

    public function getWorker(): ?Worker
    {
        return $this->Worker;
    }

    public function setWorker(?Worker $Worker): self
    {
        $this->Worker = $Worker;

        return $this;
    }
}
