<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentaireRepository;
use App\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    use TimestampTrait;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comm;

    /**
     * @ORM\ManyToOne(targetEntity=Appartement::class, inversedBy="commentaire")
     */
    private $appartement;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="commentaire")
     */
    private $garage;

    /**
     * @ORM\ManyToOne(targetEntity=Maison::class, inversedBy="commentaire")
     */
    private $maison;

    /**
     * @ORM\ManyToOne(targetEntity=Studio::class, inversedBy="commentaire")
     */
    private $studio;

    /**
     * @ORM\ManyToOne(targetEntity=Terrain::class, inversedBy="commentaire")
     */
    private $terrain;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComm(): ?string
    {
        return $this->comm;
    }

    public function setComm(?string $comm): self
    {
        $this->comm = $comm;

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

}
