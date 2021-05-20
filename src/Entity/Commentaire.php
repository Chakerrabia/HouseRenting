<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentaireRepository;
use App\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     itemOperations={
 *         "get"={
 *             "normalization_context"={
 *                "groups"={"get-client"}
 *             }
 *         }
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={
 *                "groups"={"get"}
 *             }
 *         },
 *         "post"
 *     }
 * )
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"maison.id": "exact"})
 */
class Commentaire
{
    use TimestampTrait;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"get-client", "get", "get-maison", "get-all-maison"})
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"get-client", "get", "get-maison", "get-all-maison"})
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

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="commentaires")
     * @Groups({"get-client", "get", "get-maison", "get-all-maison"})
     */
    private $client;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->isDeleted = false;
    }

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
