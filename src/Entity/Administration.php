<?php

namespace App\Entity;

use App\Repository\AdministrationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AdministrationRepository::class)
 */
class Administration
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
    private $Name;

    /**
     * @ORM\Column(type="text")
     * @Groups("post:read")
     */
    private $Map_Coordinates;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $Type;

    /**
     * @ORM\OneToMany(targetEntity=Worker::class, mappedBy="Administration")
     * @Groups("post:read")
     */
    private $workers;

    /**
     * @ORM\OneToMany(targetEntity=Gichet::class, mappedBy="Administration")
     */
    private $gichets;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="Administration")
     */
    private $tickets;

    public function __construct()
    {
        $this->workers = new ArrayCollection();
        $this->gichets = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getMapCoordinates(): ?string
    {
        return $this->Map_Coordinates;
    }

    public function setMapCoordinates(string $Map_Coordinates): self
    {
        $this->Map_Coordinates = $Map_Coordinates;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection|Worker[]
     */
    public function getWorkers(): Collection
    {
        return $this->workers;
    }

    public function addWorker(Worker $worker): self
    {
        if (!$this->workers->contains($worker)) {
            $this->workers[] = $worker;
            $worker->setAdministration($this);
        }

        return $this;
    }

    public function removeWorker(Worker $worker): self
    {
        if ($this->workers->removeElement($worker)) {
            // set the owning side to null (unless already changed)
            if ($worker->getAdministration() === $this) {
                $worker->setAdministration(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Gichet[]
     */
    public function getGichets(): Collection
    {
        return $this->gichets;
    }

    public function addGichet(Gichet $gichet): self
    {
        if (!$this->gichets->contains($gichet)) {
            $this->gichets[] = $gichet;
            $gichet->setAdministration($this);
        }

        return $this;
    }

    public function removeGichet(Gichet $gichet): self
    {
        if ($this->gichets->removeElement($gichet)) {
            // set the owning side to null (unless already changed)
            if ($gichet->getAdministration() === $this) {
                $gichet->setAdministration(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setAdministration($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getAdministration() === $this) {
                $ticket->setAdministration(null);
            }
        }

        return $this;
    }
}
