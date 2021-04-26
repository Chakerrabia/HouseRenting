<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ContratRepository::class)
 */
class Contrat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEffectif;

    /**
     * @ORM\Column(type="float")
     */
    private $prixEffectif;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="contrats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $locataire;

    /**
     * @ORM\ManyToOne(targetEntity=Maison::class, inversedBy="contrats")
     */
    private $maison;

    /**
     * @ORM\ManyToOne(targetEntity=Studio::class, inversedBy="contrats")
     */
    private $studio;

    /**
     * @ORM\ManyToOne(targetEntity=Terrain::class, inversedBy="contrats")
     */
    private $terrain;

    /**
     * @ORM\ManyToOne(targetEntity=Appartement::class, inversedBy="contrats")
     */
    private $appartement;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="contrats")
     */
    private $garage;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEffectif(): ?\DateTimeInterface
    {
        return $this->dateEffectif;
    }

    public function setDateEffectif(\DateTimeInterface $dateEffectif): self
    {
        $this->dateEffectif = $dateEffectif;

        return $this;
    }

    public function getPrixEffectif(): ?float
    {
        return $this->prixEffectif;
    }

    public function setPrixEffectif(float $prixEffectif): self
    {
        $this->prixEffectif = $prixEffectif;

        return $this;
    }

    public function getLocataire(): ?Client
    {
        return $this->locataire;
    }

    public function setLocataire(?Client $locataire): self
    {
        $this->locataire = $locataire;

        return $this;
    }

    public function getMaison(): ?Maison
    {
        return $this->maison;
    }

    public function setMaison(?Maison $maison): self
    {
        $this->maison = $maison;

        return $this;
    }

    public function getStudio(): ?Studio
    {
        return $this->studio;
    }

    public function setStudio(?Studio $studio): self
    {
        $this->studio = $studio;

        return $this;
    }

    public function getTerrain(): ?Terrain
    {
        return $this->terrain;
    }

    public function setTerrain(?Terrain $terrain): self
    {
        $this->terrain = $terrain;

        return $this;
    }

    public function getAppartement(): ?Appartement
    {
        return $this->appartement;
    }

    public function setAppartement(?Appartement $appartement): self
    {
        $this->appartement = $appartement;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

}
