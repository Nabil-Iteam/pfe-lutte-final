<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpFoundation\File\File;
use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ApiResource
 * @ApiFilter(SearchFilter::class, properties={"firstName": "partial", "cin": "partial", "club": "partial"})
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 * @Vich\Uploadable

 */
class Member
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="date_immutable", nullable=false )
     */
    private $birthDay;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $cin;

    /**
     * @ORM\Column(type="integer")
     */
    private $numActBirth;

    /**
     * @ORM\ManyToMany(targetEntity=Club::class, inversedBy="members")
     */
    private $club;

    /**
     * @ORM\ManyToMany(targetEntity=BeltGrade::class, inversedBy="members")
     */
    private $beltGrade;

    /**
     * @ORM\ManyToMany(targetEntity=CoachGrade::class, inversedBy="members")
     */
    private $coachGrade;

    /**
     * @ORM\ManyToMany(targetEntity=DirigeantType::class, inversedBy="members")
     */
    private $dirigeantType;

    /**
     * @ORM\ManyToOne(targetEntity=Municipality::class, inversedBy="members")
     * @ORM\JoinColumn(nullable=false)
     */
    private $municipality;

    /**
     * @ORM\ManyToMany(targetEntity=RefreeGrade::class, inversedBy="members")
     */
    private $refreeGrade;

    /**
     * @ORM\ManyToMany(targetEntity=Season::class, inversedBy="members")
     */
    private $season;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arabicName;

    /**
     * @ORM\ManyToOne(targetEntity=AthletCategory::class, inversedBy="members")
     */
    private $athletCategory;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Gedmo\Timestampable(on="create")
     */

    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Gedmo\Timestampable(on="update")
     */

    private $updatedAt;




    public function __construct()
    {
        $this->club = new ArrayCollection();
        $this->beltGrade = new ArrayCollection();
        $this->coachGrade = new ArrayCollection();
        $this->dirigeantType = new ArrayCollection();
        $this->refreeGrade = new ArrayCollection();
        $this->season = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDay(): ?\DateTimeImmutable
    {
        return $this->birthDay;
    }

    public function setBirthDay(\DateTimeImmutable $birthDay): self
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNumActBirth(): ?int
    {
        return $this->numActBirth;
    }

    public function setNumActBirth(int $numActBirth): self
    {
        $this->numActBirth = $numActBirth;

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getClub(): Collection
    {
        return $this->club;
    }

    public function addClub(Club $club): self
    {
        if (!$this->club->contains($club)) {
            $this->club[] = $club;
        }

        return $this;
    }

    public function removeClub(Club $club): self
    {
        $this->club->removeElement($club);

        return $this;
    }

    /**
     * @return Collection<int, BeltGrade>
     */
    public function getBeltGrade(): Collection
    {
        return $this->beltGrade;
    }

    public function addBeltGrade(BeltGrade $beltGrade): self
    {
        if (!$this->beltGrade->contains($beltGrade)) {
            $this->beltGrade[] = $beltGrade;
        }

        return $this;
    }

    public function removeBeltGrade(BeltGrade $beltGrade): self
    {
        $this->beltGrade->removeElement($beltGrade);

        return $this;
    }

    /**
     * @return Collection<int, CoachGrade>
     */
    public function getCoachGrade(): Collection
    {
        return $this->coachGrade;
    }

    public function addCoachGrade(CoachGrade $coachGrade): self
    {
        if (!$this->coachGrade->contains($coachGrade)) {
            $this->coachGrade[] = $coachGrade;
        }

        return $this;
    }

    public function removeCoachGrade(CoachGrade $coachGrade): self
    {
        $this->coachGrade->removeElement($coachGrade);

        return $this;
    }

    /**
     * @return Collection<int, DirigeantType>
     */
    public function getDirigeantType(): Collection
    {
        return $this->dirigeantType;
    }

    public function addDirigeantType(DirigeantType $dirigeantType): self
    {
        if (!$this->dirigeantType->contains($dirigeantType)) {
            $this->dirigeantType[] = $dirigeantType;
        }

        return $this;
    }

    public function removeDirigeantType(DirigeantType $dirigeantType): self
    {
        $this->dirigeantType->removeElement($dirigeantType);

        return $this;
    }

    public function getMunicipality(): ?Municipality
    {
        return $this->municipality;
    }

    public function setMunicipality(?Municipality $municipality): self
    {
        $this->municipality = $municipality;

        return $this;
    }

    /**
     * @return Collection<int, RefreeGrade>
     */
    public function getRefreeGrade(): Collection
    {
        return $this->refreeGrade;
    }

    public function addRefreeGrade(RefreeGrade $refreeGrade): self
    {
        if (!$this->refreeGrade->contains($refreeGrade)) {
            $this->refreeGrade[] = $refreeGrade;
        }

        return $this;
    }

    public function removeRefreeGrade(RefreeGrade $refreeGrade): self
    {
        $this->refreeGrade->removeElement($refreeGrade);

        return $this;
    }

    /**
     * @return Collection<int, Season>
     */
    public function getSeason(): Collection
    {
        return $this->season;
    }

    public function addSeason(Season $season): self
    {
        if (!$this->season->contains($season)) {
            $this->season[] = $season;
        }

        return $this;
    }

    public function removeSeason(Season $season): self
    {
        $this->season->removeElement($season);

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

    public function getAthletCategory(): ?AthletCategory
    {
        return $this->athletCategory;
    }

    public function setAthletCategory(?AthletCategory $athletCategory): self
    {
        $this->athletCategory = $athletCategory;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }



    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTimeImmutable('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image )
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }




}
