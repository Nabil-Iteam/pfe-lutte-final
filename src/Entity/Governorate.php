<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GovernorateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=GovernorateRepository::class)
 */
class Governorate
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arabicName;

    /**
     * @ORM\OneToMany(targetEntity=Municipality::class, mappedBy="governorate")
     */
    private $municipality;

    /**
     * @ORM\OneToMany(targetEntity=Club::class, mappedBy="governorate")
     */
    private $clubs;



    public function __construct()
    {
        $this->municipality = new ArrayCollection();
        $this->clubs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getArabicName(): ?string
    {
        return $this->arabicName;
    }

    public function setArabicName(string $arabicName): self
    {
        $this->arabicName = $arabicName;

        return $this;
    }

    /**
     * @return Collection<int, Municipality>
     */
    public function getMunicipality(): Collection
    {
        return $this->municipality;
    }

    public function addMunicipality(Municipality $municipality): self
    {
        if (!$this->municipality->contains($municipality)) {
            $this->municipality[] = $municipality;
            $municipality->setGovernorate($this);
        }

        return $this;
    }

    public function removeMunicipality(Municipality $municipality): self
    {
        if ($this->municipality->removeElement($municipality)) {
            // set the owning side to null (unless already changed)
            if ($municipality->getGovernorate() === $this) {
                $municipality->setGovernorate(null);
            }
        }

        return $this;
    }




    /**
     * @return Collection<int, Club>
     */
    public function getClubs(): Collection
    {
        return $this->clubs;
    }

    public function addClub(Club $club): self
    {
        if (!$this->clubs->contains($club)) {
            $this->clubs[] = $club;
            $club->setGovernorate($this);
        }

        return $this;
    }

    public function removeClub(Club $club): self
    {
        if ($this->clubs->removeElement($club)) {
            // set the owning side to null (unless already changed)
            if ($club->getGovernorate() === $this) {
                $club->setGovernorate(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name;
    }
}
