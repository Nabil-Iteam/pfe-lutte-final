<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClubRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 * @Vich\Uploadable
 */
class Club implements CreatorEntityInterface
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
     * @ORM\Column(type="string", length=255)
     */
    private $abreviation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @ORM\Column(type="string")
     */
    private $fax;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $para;

    /**
     * @ORM\Column(type="integer")
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autorisationCode;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $fondationYear;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coachName;

    /**
     * @ORM\Column(type="string")
     */
    private $coachPhone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $presidentName;

    /**
     * @ORM\Column(type="string")
     */
    private $presidentPhone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secretaryName;

    /**
     * @ORM\Column(type="string")
     */
    private $treasurerPhone;

    /**
     * @ORM\Column(type="string")
     */
    private $secretaryPhone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $treasurerName;

    /**
     * @ORM\Column(type="datetime_immutable",nullable=true)
     * @Gedmo\Timestampable(on="create")
     */

    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Gedmo\Timestampable(on="update")
     */

    private $updatedAt;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;




    /**
     * @ORM\ManyToOne(targetEntity=Municipality::class, inversedBy="clubs")
     */
    private $municipality;

    /**
     * @ORM\ManyToMany(targetEntity=Season::class, inversedBy="clubs")
     */
    private $season;

    /**
     * @ORM\ManyToMany(targetEntity=Member::class, mappedBy="club")
     */
    private $members;



    /**
     * @ORM\ManyToOne(targetEntity=Governorate::class, inversedBy="clubs")
     */
    private $governorate;

    /**
     * @ORM\ManyToOne(targetEntity=TypeClub::class, inversedBy="clubs")
     */
    private $typeClub;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isValid;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="club", cascade={"persist", "remove"})
     */
    private $createdBy;



    public function __construct()
    {
        $this->season = new ArrayCollection();
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

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(string $abreviation): self
    {
        $this->abreviation = $abreviation;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function isPara(): ?bool
    {
        return $this->para;
    }

    public function setPara(bool $para): self
    {
        $this->para = $para;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getAutorisationCode(): ?string
    {
        return $this->autorisationCode;
    }

    public function setAutorisationCode(string $autorisationCode): self
    {
        $this->autorisationCode = $autorisationCode;

        return $this;
    }

    public function getFondationYear()
    {

        return $this->fondationYear?$this->fondationYear->format('Y-m-d'): $this->fondationYear;
    }

    public function setFondationYear( $fondationYear): self
    {
        try {
            $this->fondationYear = new  \DateTime($fondationYear);

        } catch (\Exception $e) {
        }
        return $this;
    }

    public function getCoachName(): ?string
    {
        return $this->coachName;
    }

    public function setCoachName(?string $coachName): self
    {
        $this->coachName = $coachName;

        return $this;
    }

    public function getCoachPhone(): ?string
    {
        return $this->coachPhone;
    }

    public function setCoachPhone(string $coachPhone): self
    {
        $this->coachPhone = $coachPhone;

        return $this;
    }

    public function getPresidentName(): ?string
    {
        return $this->presidentName;
    }

    public function setPresidentName(string $presidentName): self
    {
        $this->presidentName = $presidentName;

        return $this;
    }

    public function getPresidentPhone(): ?string
    {
        return $this->presidentPhone;
    }

    public function setPresidentPhone(string $presidentPhone): self
    {
        $this->presidentPhone = $presidentPhone;

        return $this;
    }

    public function getSecretaryName(): ?string
    {
        return $this->secretaryName;
    }

    public function setSecretaryName(string $secretaryName): self
    {
        $this->secretaryName = $secretaryName;

        return $this;
    }

    public function getTreasurerPhone(): ?string
    {
        return $this->treasurerPhone;
    }

    public function setTreasurerPhone(string $treasurerPhone): self
    {
        $this->treasurerPhone = $treasurerPhone;

        return $this;
    }

    public function getSecretaryPhone(): ?string
    {
        return $this->secretaryPhone;
    }

    public function setSecretaryPhone(string $secretaryPhone): self
    {
        $this->secretaryPhone = $secretaryPhone;

        return $this;
    }

    public function getTreasurerName(): ?string
    {
        return $this->treasurerName;
    }

    public function setTreasurerName(string $treasurerName): self
    {
        $this->treasurerName = $treasurerName;

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
            $member->addClub($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->removeElement($member)) {
            $member->removeClub($this);
        }

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
    public function __toString(){
        return $this->name;
    }

    public function getTypeClub(): ?TypeClub
    {
        return $this->typeClub;
    }

    public function setTypeClub(?TypeClub $typeClub): self
    {
        $this->typeClub = $typeClub;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function isIsValid(): ?bool
    {
        return $this->isValid;
    }

    public function setIsValid(?bool $isValid): self
    {
        $this->isValid = $isValid;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?UserInterface $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }


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
     * @ORM\Column(type="datetime",nullable=true)
     * @var DateTime
     */
    private DateTime $updatedFileAt;


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedFileAt = new DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

}
