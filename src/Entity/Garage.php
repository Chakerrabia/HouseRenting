<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GarageRepository;
use App\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=GarageRepository::class)
 */
class Garage extends Logement
{
    use TimestampTrait;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="garage")
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="garage")
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=Rating::class, mappedBy="garage")
     */
    private $ratings;
    /**
     * @ORM\OneToMany(targetEntity=Contrat::class, mappedBy="garage")
     */
    private $contrats;

    /**
     * @ORM\ManyToOne(targetEntity=Proprietaire::class, inversedBy="garages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proprietaire;




    public function __construct()
    {
        $this->photo = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->ratings = new ArrayCollection();
        $this->contrats = new ArrayCollection();
    }




    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(?float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photo->contains($photo)) {
            $this->photo[] = $photo;
            $photo->setGarage($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getGarage() === $this) {
                $photo->setGarage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setGarage($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getGarage() === $this) {
                $commentaire->setGarage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rating[]
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(Rating $rating): self
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings[] = $rating;
            $rating->setGarage($this);
        }
    }
    /**
     * @return Collection|Contrat[]
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats[] = $contrat;
            $contrat->setGarage($this);
        }

        return $this;
    }

    public function removeRating(Rating $rating): self
    {
        if ($this->ratings->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getGarage() === $this) {
                $rating->setGarage(null);
    public function removeContrat(Contrat $contrat): self
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getGarage() === $this) {
                $contrat->setGarage(null);
            }
        }

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

}
