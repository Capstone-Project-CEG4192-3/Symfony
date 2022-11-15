<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    

    #[ORM\Column]
    private ?bool $is_empty = null;

    #[ORM\Column]
    private ?int $total_place = null;

    #[ORM\Column]
    private ?int $Availabl_spot = null;

    #[ORM\Column]
    private ?int $full_spot = null;

    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Users::class, orphanRemoval: true)]
    private Collection $users;

    #[ORM\OneToOne(inversedBy: 'place', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Image $images = null;

    #[ORM\OneToOne(mappedBy: 'place_info', cascade: ['persist', 'remove'])]
    private ?Information $information = null;


    

    public function __construct()
    {
        $this->utilisateur = new ArrayCollection();
        $this->dossier = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function isIsEmpty(): ?bool
    {
        return $this->is_empty;
    }

    public function setIsEmpty(bool $is_empty): self
    {
        $this->is_empty = $is_empty;

        return $this;
    }

    public function getTotalPlace(): ?int
    {
        return $this->total_place;
    }

    public function setTotalPlace(int $total_place): self
    {
        $this->total_place = $total_place;

        return $this;
    }

    public function getAvailablSpot(): ?int
    {
        return $this->Availabl_spot;
    }

    public function setAvailablSpot(int $Availabl_spot): self
    {
        $this->Availabl_spot = $Availabl_spot;

        return $this;
    }

    public function getFullSpot(): ?int
    {
        return $this->full_spot;
    }

    public function setFullSpot(int $full_spot): self
    {
        $this->full_spot = $full_spot;

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setPlace($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getPlace() === $this) {
                $user->setPlace(null);
            }
        }

        return $this;
    }

    public function getImages(): ?Image
    {
        return $this->images;
    }

    public function setImages(Image $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->is_empty;
    }

    public function getInformation(): ?Information
    {
        return $this->information;
    }

    public function setInformation(Information $information): self
    {
        // set the owning side of the relation if necessary
        if ($information->getPlaceInfo() !== $this) {
            $information->setPlaceInfo($this);
        }

        $this->information = $information;

        return $this;
    }
    
    
}
