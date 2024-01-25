<?php

namespace App\Entity;

use App\Repository\HolderRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Address;

#[ORM\Entity(repositoryClass: HolderRepository::class)]
class Holder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?address $address = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress(): ?address
    {
        return $this->address;
    }

    public function setAddress(?address $address): static
    {
        $this->address = $address;

        return $this;
    }
}
