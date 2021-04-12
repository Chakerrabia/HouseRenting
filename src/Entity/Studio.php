<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudioRepository;
use App\Traits\TimestampTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=StudioRepository::class)
 */
class Studio extends Logement
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
    private $etage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ascenseur;

    /**
     * @ORM\ManyToOne(targetEntity=Photo::class, inversedBy="studio")
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

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getAscenseur(): ?bool
    {
        return $this->ascenseur;
    }

    public function setAscenseur(?bool $ascenseur): self
    {
        $this->ascenseur = $ascenseur;

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
