<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $type;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $remarques;

//    /**
//     * @ORM\ManyToOne(targetEntity=logement::class)
//     */
//    private $logement;
//
//    /**
//     * @ORM\ManyToOne(targetEntity=Logement::class, inversedBy="categorie")
//     */
//    private $lo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRemarques(): ?string
    {
        return $this->remarques;
    }

    public function setRemarques(?string $remarques): self
    {
        $this->remarques = $remarques;

        return $this;
    }

//    public function getLogement(): ?logement
//    {
//        return $this->logement;
//    }
//
//    public function setLogement(?logement $logement): self
//    {
//        $this->logement = $logement;
//
//        return $this;
//    }
//
//    public function getLo(): ?Logement
//    {
//        return $this->lo;
//    }
//
//    public function setLo(?Logement $lo): self
//    {
//        $this->lo = $lo;
//
//        return $this;
//    }
}
