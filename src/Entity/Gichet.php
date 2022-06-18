<?php

namespace App\Entity;

use App\Repository\GichetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GichetRepository::class)
 */
class Gichet
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
    private $Code;

    /**
     * @ORM\OneToOne(targetEntity=Worker::class, cascade={"persist", "remove"})
     */
    private $Worker;

    /**
     * @ORM\ManyToOne(targetEntity=Administration::class, inversedBy="gichets")
     */
    private $Administration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(string $Code): self
    {
        $this->Code = $Code;

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
