<?php

namespace App\Entity;

use App\Repository\MaisonRepository;
use App\Traits\TimestampTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaisonRepository::class)
 */
class Maison extends Logement
{
    use TimestampTrait;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbChambre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jardin;

    /**
     * @ORM\ManyToOne(targetEntity=Photo::class, inversedBy="maison")
     */
    /**
    */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNbChambre(): ?int
    {
        return $this->nbChambre;
    }

    public function setNbChambre(?int $nbChambre): self
    {
        $this->nbChambre = $nbChambre;

        return $this;
    }

    public function getJardin(): ?string
    {
        return $this->jardin;
    }

    public function setJardin(?string $jardin): self
    {
        $this->jardin = $jardin;

        return $this;
    }

    public function getPhoto(): ?Photo
    {
        return $this->photo;
    }

    public function setPhoto(?Photo $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
