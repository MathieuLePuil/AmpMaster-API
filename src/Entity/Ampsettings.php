<?php

namespace App\Entity;

use App\Repository\AmpsettingsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AmpsettingsRepository::class)]
class Ampsettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $groupe = null;

    #[ORM\Column]
    private ?int $gain = null;

    #[ORM\Column]
    private ?int $treble = null;

    #[ORM\Column]
    private ?int $middle = null;

    #[ORM\Column]
    private ?int $bass = null;

    #[ORM\Column(nullable: true)]
    private ?int $reverb = null;

    #[ORM\ManyToOne(inversedBy: 'ampsettings')]
    private ?User $User = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'ampsettings')]
    private Collection $Favorite;

    public function __construct()
    {
        $this->Favorite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(?string $groupe): static
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getGain(): ?int
    {
        return $this->gain;
    }

    public function setGain(int $gain): static
    {
        $this->gain = $gain;

        return $this;
    }

    public function getTreble(): ?int
    {
        return $this->treble;
    }

    public function setTreble(int $treble): static
    {
        $this->treble = $treble;

        return $this;
    }

    public function getMiddle(): ?int
    {
        return $this->middle;
    }

    public function setMiddle(int $middle): static
    {
        $this->middle = $middle;

        return $this;
    }

    public function getBass(): ?int
    {
        return $this->bass;
    }

    public function setBass(int $bass): static
    {
        $this->bass = $bass;

        return $this;
    }

    public function getReverb(): ?int
    {
        return $this->reverb;
    }

    public function setReverb(int $reverb): static
    {
        $this->reverb = $reverb;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getFavorite(): Collection
    {
        return $this->Favorite;
    }

    public function addFavorite(User $favorite): static
    {
        if (!$this->Favorite->contains($favorite)) {
            $this->Favorite->add($favorite);
        }

        return $this;
    }

    public function removeFavorite(User $favorite): static
    {
        $this->Favorite->removeElement($favorite);

        return $this;
    }
}
