<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LogementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 */
class Logement
{

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $num;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixAchat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixLocation;



//    /**
//     * @ORM\OneToMany(targetEntity=categorie::class, mappedBy="lo")
//     */
//    private $categorie;

//    public function __construct()
//    {
//        $this->categorie = new ArrayCollection();
//    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNum(): ?string
    {
        return $this->num;
    }

    public function setNum(?string $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(?float $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getPrixLocation(): ?float
    {
        return $this->prixLocation;
    }

    public function setPrixLocation(?float $prixLocation): self
    {
        $this->prixLocation = $prixLocation;

        return $this;
    }

//
//    /**
//     * @return Collection|categorie[]
//     */
//    public function getCategorie(): Collection
//    {
//        return $this->categorie;
//    }
//
//    public function addCategorie(categorie $categorie): self
//    {
//        if (!$this->categorie->contains($categorie)) {
//            $this->categorie[] = $categorie;
//            $categorie->setLo($this);
//        }
//
//        return $this;
//    }
//
//    public function removeCategorie(categorie $categorie): self
//    {
//        if ($this->categorie->removeElement($categorie)) {
//            // set the owning side to null (unless already changed)
//            if ($categorie->getLo() === $this) {
//                $categorie->setLo(null);
//            }
//        }
//
//        return $this;
//    }
}
