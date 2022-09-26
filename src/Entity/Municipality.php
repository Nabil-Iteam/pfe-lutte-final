<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MunicipalityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=MunicipalityRepository::class)
 */
class Municipality
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
     * @ORM\ManyToOne(targetEntity=Governorate::class, inversedBy="municipality")
     */
    private $governorate;

    /**
     * @ORM\OneToMany(targetEntity=Club::class, mappedBy="municipality")
     */
    private $clubs;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="municipality")
     */
    private $members;

    public function __construct()
    {
        $this->clubs = new ArrayCollection();
        $this->members = new ArrayCollection();
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

    public function getGovernorate(): ?Governorate
    {
        return $this->governorate;
    }

    public function setGovernorate(?Governorate $governorate): self
    {
        $this->governorate = $governorate;

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
            $club->setMunicipality($this);
        }

        return $this;
    }

    public function removeClub(Club $club): self
    {
        if ($this->clubs->removeElement($club)) {
            // set the owning side to null (unless already changed)
            if ($club->getMunicipality() === $this) {
                $club->setMunicipality(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Member>
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setMunicipality($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getMunicipality() === $this) {
                $member->setMunicipality(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->name;
    }
}
