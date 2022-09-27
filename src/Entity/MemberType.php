<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MemberTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=MemberTypeRepository::class)
 */
class MemberType
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
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="relation")
     */
    private $MemberType;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="memberType")
     */
    private $members;

    public function __construct()
    {
        $this->MemberType = new ArrayCollection();
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

    public function __toString(){
        return $this->name;
    }

    /**
     * @return Collection<int, Member>
     */
    public function getMemberType(): Collection
    {
        return $this->MemberType;
    }

    public function addMemberType(Member $memberType): self
    {
        if (!$this->MemberType->contains($memberType)) {
            $this->MemberType[] = $memberType;
            $memberType->setRelation($this);
        }

        return $this;
    }

    public function removeMemberType(Member $memberType): self
    {
        if ($this->MemberType->removeElement($memberType)) {
            // set the owning side to null (unless already changed)
            if ($memberType->getRelation() === $this) {
                $memberType->setRelation(null);
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
            $member->setMemberType($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getMemberType() === $this) {
                $member->setMemberType(null);
            }
        }

        return $this;
    }
}
