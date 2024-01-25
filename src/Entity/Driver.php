<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriverRepository::class)]
class Driver
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $maritalStatus = null;

    #[ORM\Column]
    private ?int $licenseNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $licenseState = null;

    #[ORM\Column(length: 255)]
    private ?string $licenseStatus = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $licenseEffectiveDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $licenseExpirationDate = null;

    #[ORM\Column(length: 255)]
    private ?string $licenseClass = null;

    #[ORM\ManyToOne(inversedBy: 'drivers')]
    private Policy $policy;



    public function __construct()
    {

    }

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getMaritalStatus(): ?string
    {
        return $this->maritalStatus;
    }

    public function setMaritalStatus(string $maritalStatus): static
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    public function getLicenseNumber(): ?int
    {
        return $this->licenseNumber;
    }

    public function setLicenseNumber(int $licenseNumber): static
    {
        $this->licenseNumber = $licenseNumber;

        return $this;
    }

    public function getLicenseState(): ?string
    {
        return $this->licenseState;
    }

    public function setLicenseState(string $licenseState): static
    {
        $this->licenseState = $licenseState;

        return $this;
    }

    public function getLicenseStatus(): ?string
    {
        return $this->licenseStatus;
    }

    public function setLicenseStatus(string $licenseStatus): static
    {
        $this->licenseStatus = $licenseStatus;

        return $this;
    }

    public function getLicenseEffectiveDate(): ?\DateTimeInterface
    {
        return $this->licenseEffectiveDate;
    }

    public function setLicenseEffectiveDate(\DateTimeInterface $licenseEffectiveDate): static
    {
        $this->licenseEffectiveDate = $licenseEffectiveDate;

        return $this;
    }

    public function getLicenseExpirationDate(): ?\DateTimeInterface
    {
        return $this->licenseExpirationDate;
    }

    public function setLicenseExpirationDate(\DateTimeInterface $licenseExpirationDate): static
    {
        $this->licenseExpirationDate = $licenseExpirationDate;

        return $this;
    }

    public function getLicenseClass(): ?string
    {
        return $this->licenseClass;
    }

    public function setLicenseClass(string $licenseClass): static
    {
        $this->licenseClass = $licenseClass;

        return $this;
    }

    public function getPolicy(): ?Policy
    {
        return $this->policy;
    }

    public function setPolicy(?Policy $policy): static
    {
        $this->policy = $policy;

        return $this;
    }
}
