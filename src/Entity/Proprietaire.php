<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProprietaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProprietaireRepository::class)
 */
class Proprietaire extends Personne
{
    /**
     * @ORM\OneToMany(targetEntity=Appartement::class, mappedBy="proprietaire", orphanRemoval=true)
     */
    private $appartements;

    /**
     * @ORM\OneToMany(targetEntity=Garage::class, mappedBy="proprietaire", orphanRemoval=true)
     */
    private $garages;

    /**
     * @ORM\OneToMany(targetEntity=Studio::class, mappedBy="proprietaire", orphanRemoval=true)
     */
    private $studios;

    /**
     * @ORM\OneToMany(targetEntity=Terrain::class, mappedBy="proprietaire", orphanRemoval=true)
     */
    private $terrains;

    /**
     * @ORM\OneToMany(targetEntity=Maison::class, mappedBy="proprietaire", orphanRemoval=true)
     */
    private $maisons;

    public function __construct()
    {
        $this->appartements = new ArrayCollection();
        $this->garages = new ArrayCollection();
        $this->studios = new ArrayCollection();
        $this->terrains = new ArrayCollection();
        $this->maisons = new ArrayCollection();
    }

    /**
     * @return Collection|Appartement[]
     */
    public function getAppartements(): Collection
    {
        return $this->appartements;
    }

    public function addAppartement(Appartement $appartement): self
    {
        if (!$this->appartements->contains($appartement)) {
            $this->appartements[] = $appartement;
            $appartement->setProprietaire($this);
        }

        return $this;
    }

    public function removeAppartement(Appartement $appartement): self
    {
        if ($this->appartements->removeElement($appartement)) {
            // set the owning side to null (unless already changed)
            if ($appartement->getProprietaire() === $this) {
                $appartement->setProprietaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Garage[]
     */
    public function getGarages(): Collection
    {
        return $this->garages;
    }

    public function addGarage(Garage $garage): self
    {
        if (!$this->garages->contains($garage)) {
            $this->garages[] = $garage;
            $garage->setProprietaire($this);
        }

        return $this;
    }

    public function removeGarage(Garage $garage): self
    {
        if ($this->garages->removeElement($garage)) {
            // set the owning side to null (unless already changed)
            if ($garage->getProprietaire() === $this) {
                $garage->setProprietaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Studio[]
     */
    public function getStudios(): Collection
    {
        return $this->studios;
    }

    public function addStudio(Studio $studio): self
    {
        if (!$this->studios->contains($studio)) {
            $this->studios[] = $studio;
            $studio->setProprietaire($this);
        }

        return $this;
    }

    public function removeStudio(Studio $studio): self
    {
        if ($this->studios->removeElement($studio)) {
            // set the owning side to null (unless already changed)
            if ($studio->getProprietaire() === $this) {
                $studio->setProprietaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Terrain[]
     */
    public function getTerrains(): Collection
    {
        return $this->terrains;
    }

    public function addTerrain(Terrain $terrain): self
    {
        if (!$this->terrains->contains($terrain)) {
            $this->terrains[] = $terrain;
            $terrain->setProprietaire($this);
        }

        return $this;
    }

    public function removeTerrain(Terrain $terrain): self
    {
        if ($this->terrains->removeElement($terrain)) {
            // set the owning side to null (unless already changed)
            if ($terrain->getProprietaire() === $this) {
                $terrain->setProprietaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Maison[]
     */
    public function getMaisons(): Collection
    {
        return $this->maisons;
    }

    public function addMaison(Maison $maison): self
    {
        if (!$this->maisons->contains($maison)) {
            $this->maisons[] = $maison;
            $maison->setProprietaire($this);
        }

        return $this;
    }

    public function removeMaison(Maison $maison): self
    {
        if ($this->maisons->removeElement($maison)) {
            // set the owning side to null (unless already changed)
            if ($maison->getProprietaire() === $this) {
                $maison->setProprietaire(null);
            }
        }

        return $this;
    }
}
