<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client extends Personne
{
    /**
     * @ORM\OneToMany(targetEntity=Contrat::class, mappedBy="locataire", orphanRemoval=true)
     */
    private $contrats;

    /**
     * @ORM\OneToMany(targetEntity=Rating::class, mappedBy="client")
     */
    private $ratings;



    public function __construct()
    {
        $this->contrats = new ArrayCollection();
        $this->ratings = new ArrayCollection();
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
            $contrat->setLocataire($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getLocataire() === $this) {
                $contrat->setLocataire(null);
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
            $rating->setClient($this);
        }

        return $this;
    }

    public function removeRating(Rating $rating): self
    {
        if ($this->ratings->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getClient() === $this) {
                $rating->setClient(null);
            }
        }

        return $this;
    }

}
