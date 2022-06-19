<?php

namespace App\Entity;

use App\Repository\WorkerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=WorkerRepository::class)
 */
class Worker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("post:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $First_Name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $Last_Name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $CIN;

    /**
     * @ORM\ManyToOne(targetEntity=Administration::class, inversedBy="workers")
     * @Groups("post:read")
     */
    private $Administration;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="Worker")
     * @Groups("post:read")
     */
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->First_Name;
    }

    public function setFirstName(string $First_Name): self
    {
        $this->First_Name = $First_Name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->Last_Name;
    }

    public function setLastName(string $Last_Name): self
    {
        $this->Last_Name = $Last_Name;

        return $this;
    }

    public function getCIN(): ?string
    {
        return $this->CIN;
    }

    public function setCIN(string $CIN): self
    {
        $this->CIN = $CIN;

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

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setWorker($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getWorker() === $this) {
                $order->setWorker(null);
            }
        }

        return $this;
    }
}
