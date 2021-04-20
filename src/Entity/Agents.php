<?php

namespace App\Entity;

use App\Repository\AgentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentsRepository::class)
 */
class Agents
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
    private $firstname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @ORM\Column(type="integer")
     */
    private $idCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $speciality;

    /**
     * @ORM\ManyToMany(targetEntity=Missions::class, mappedBy="agents")
     */
    private $missions;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }

    public function __toString(): string {

        return (string) $this->getIdCode().' '.'('.$this->getCountry().')';
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getIdCode(): ?int
    {
        return $this->idCode;
    }

    public function setIdCode(int $idCode): self
    {
        $this->idCode = $idCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }



    /**
     * @return Collection|Missions[]
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Missions $mission): self
    {
        if (!$this->missions->contains($mission)) {
            $this->missions[] = $mission;
            $mission->addAgent($this);
        }

        return $this;
    }

    public function removeMission(Missions $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeAgent($this);
        }

        return $this;
    }
}
