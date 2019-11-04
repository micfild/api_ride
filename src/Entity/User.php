<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $passHash;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\BikeType")
     * @Groups({"read", "write"})
     */
    private $bikeType;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read", "write"})
     */
    private $drivingStyle;

    /**
     * @ORM\Column(type="text")
     * @Groups({"read", "write"})
     */
    private $description;

    public function __construct()
    {
        $this->bikeType = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPassHash(): ?string
    {
        return $this->passHash;
    }

    public function setPassHash(string $passHash): self
    {
        $this->passHash = $passHash;

        return $this;
    }

    /**
     * @return Collection|BikeType[]
     */
    public function getBikeType(): Collection
    {
        return $this->bikeType;
    }

    public function addBikeType(BikeType $bikeType): self
    {
        if (!$this->bikeType->contains($bikeType)) {
            $this->bikeType[] = $bikeType;
        }

        return $this;
    }

    public function removeBikeType(BikeType $bikeType): self
    {
        if ($this->bikeType->contains($bikeType)) {
            $this->bikeType->removeElement($bikeType);
        }

        return $this;
    }

    public function getDrivingStyle(): ?int
    {
        return $this->drivingStyle;
    }

    public function setDrivingStyle(int $drivingStyle): self
    {
        $this->drivingStyle = $drivingStyle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

}
