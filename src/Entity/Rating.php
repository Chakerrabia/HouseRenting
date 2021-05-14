<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RatingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RatingRepository::class)
 */
class Rating
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity=Appartement::class, inversedBy="ratings")
     */
    private $appartmement;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="ratings")
     */
    private $garage;

    /**
     * @ORM\ManyToOne(targetEntity=Maison::class, inversedBy="ratings")
     */
    private $maison;

    /**
     * @ORM\ManyToOne(targetEntity=Studio::class, inversedBy="ratings")
     */
    private $studio;

    /**
     * @ORM\ManyToOne(targetEntity=Terrain::class, inversedBy="ratings")
     */
    private $terrain;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="ratings")
     */
    private $client;




    public function __construct()
    {
        $this->locataire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getAppartmement(): ?Appartement
    {
        return $this->appartmement;
    }

    public function setAppartmement(?Appartement $appartmement): self
    {
        $this->appartmement = $appartmement;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }


}
