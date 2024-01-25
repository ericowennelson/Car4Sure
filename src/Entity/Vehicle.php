<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Coverage;
use App\Entity\Address;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column(length: 255)]
    private ?string $make = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $vin = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicleUsage = null;

    #[ORM\Column(length: 255)]
    private ?string $primaryUse = null;

    #[ORM\Column]
    private ?int $annualMileage = null;

    #[ORM\Column(length: 255)]
    private ?string $ownership = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    private ?address $garagingAddress = null;

    #[ORM\OneToMany(mappedBy: 'vehicle', targetEntity: coverage::class)]
    private Collection $coverages;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    private ?Policy $policy = null;

    public function __construct()
    {
        $this->coverages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(string $make): static
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getVin(): ?int
    {
        return $this->vin;
    }

    public function setVin(int $vin): static
    {
        $this->vin = $vin;

        return $this;
    }

    public function getVehicleUsage(): ?string
    {
        return $this->vehicleUsage;
    }

    public function setVehicleUsage(string $vehicleUsage): static
    {
        $this->vehicleUsage = $vehicleUsage;

        return $this;
    }

    public function getPrimaryUse(): ?string
    {
        return $this->primaryUse;
    }

    public function setPrimaryUse(string $primaryUse): static
    {
        $this->primaryUse = $primaryUse;

        return $this;
    }

    public function getAnnualMileage(): ?int
    {
        return $this->annualMileage;
    }

    public function setAnnualMileage(int $annualMileage): static
    {
        $this->annualMileage = $annualMileage;

        return $this;
    }

    public function getOwnership(): ?string
    {
        return $this->ownership;
    }

    public function setOwnership(string $ownership): static
    {
        $this->ownership = $ownership;

        return $this;
    }

    public function getGaragingAddress(): ?address
    {
        return $this->garagingAddress;
    }

    public function setGaragingAddress(?address $garagingAddress): static
    {
        $this->garagingAddress = $garagingAddress;

        return $this;
    }

    /**
     * @return Collection<int, coverage>
     */
    public function getCoverages(): Collection
    {
        return $this->coverages;
    }

    public function addCoverage(coverage $coverage): static
    {
        if (!$this->coverages->contains($coverage)) {
            $this->coverages->add($coverage);
            $coverage->setVehicle($this);
        }

        return $this;
    }

    public function removeCoverage(coverage $coverage): static
    {
        if ($this->coverages->removeElement($coverage)) {
            // set the owning side to null (unless already changed)
            if ($coverage->getVehicle() === $this) {
                $coverage->setVehicle(null);
            }
        }

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
