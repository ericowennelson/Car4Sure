<?php

namespace App\Entity;

use App\Repository\PolicyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Holder;
use App\Entity\Driver;
use App\Entity\Vehicle;
use App\Entity\Address;

#[ORM\Entity(repositoryClass: PolicyRepository::class)]
class Policy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $policyNo = null;

    #[ORM\Column(length: 255)]
    private ?string $policyStatus = null;

    #[ORM\Column(length: 255)]
    private ?string $policyType = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $policyEffectiveDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $policyExpirationDate = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Holder $policyHolder = null;

    #[ORM\OneToMany(mappedBy: 'policy', targetEntity: driver::class)]
    private Collection $drivers;

    #[ORM\OneToMany(mappedBy: 'policy', targetEntity: vehicle::class)]
    private Collection $vehicles;

    public function __construct()
    {
        $this->drivers = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPolicyNo(): ?int
    {
        return $this->policyNo;
    }

    public function setPolicyNo(int $policyNo): static
    {
        $this->policyNo = $policyNo;

        return $this;
    }

    public function getPolicyStatus(): ?string
    {
        return $this->policyStatus;
    }

    public function setPolicyStatus(string $policyStatus): static
    {
        $this->policyStatus = $policyStatus;

        return $this;
    }

    public function getPolicyType(): ?string
    {
        return $this->policyType;
    }

    public function setPolicyType(string $policyType): static
    {
        $this->policyType = $policyType;

        return $this;
    }

    public function getPolicyEffectiveDate(): ?\DateTimeInterface
    {
        return $this->policyEffectiveDate;
    }

    public function setPolicyEffectiveDate(\DateTimeInterface $policyEffectiveDate): static
    {
        $this->policyEffectiveDate = $policyEffectiveDate;

        return $this;
    }

    public function getPolicyExpirationDate(): ?\DateTimeInterface
    {
        return $this->policyExpirationDate;
    }

    public function setPolicyExpirationDate(\DateTimeInterface $policyExpirationDate): static
    {
        $this->policyExpirationDate = $policyExpirationDate;

        return $this;
    }

    public function getPolicyHolder(): ?holder
    {
        return $this->policyHolder;
    }

    public function setPolicyHolder(?holder $policyHolder): static
    {
        $this->policyHolder = $policyHolder;

        return $this;
    }

    /**
     * @return Collection<int, driver>
     */
    public function getDrivers(): Collection
    {
        return $this->drivers;
    }

    public function addDriver(driver $driver): static
    {
        if (!$this->drivers->contains($driver)) {
            $this->drivers->add($driver);
            $driver->setPolicy($this);
        }

        return $this;
    }

    public function removeDriver(driver $driver): static
    {
        $this->drivers->removeElement($driver);

        return $this;
    }

    /**
     * @return Collection<int, vehicle>
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(vehicle $vehicle): static
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles->add($vehicle);
            $vehicle->setPolicy($this);
        }

        return $this;
    }

    public function removeVehicle(vehicle $vehicle): static
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getPolicy() === $this) {
                $vehicle->setPolicy(null);
            }
        }

        return $this;
    }
}
