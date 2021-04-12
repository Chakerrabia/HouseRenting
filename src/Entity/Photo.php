<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PhotoRepository;
use App\Traits\TimestampTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 * @Vich\Uploadable()
 */
class Photo
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

    private $image;
    /**
     * @Vich\UploadableField(mapping="post_images", fileNameProperty="image")
     * @var File
    */

    private $imageFile;

    /**
     * @return mixed
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param mixed $imageFile
     */
    public function setImageFile(File $imageFile)
    {
        $this->imageFile = $imageFile;

    }


    /**
     * @ORM\OneToMany(targetEntity=Terrain::class, mappedBy="photo")
     */
    private $terrain;

    /**
     * @ORM\OneToMany(targetEntity=Studio::class, mappedBy="photo")
     */
    private $studio;

    /**
     * @ORM\OneToMany(targetEntity=Maison::class, mappedBy="photo")
     */
    private $maison;

    /**
     * @ORM\OneToMany(targetEntity=Appartement::class, mappedBy="photo")
     */
    private $appartement;

    /**
     * @ORM\OneToMany(targetEntity=Garage::class, mappedBy="photo")
     */
    private $garage;

    public function __construct()
    {
        $this->terrain = new ArrayCollection();
        $this->studio = new ArrayCollection();
        $this->maison = new ArrayCollection();
        $this->appartement = new ArrayCollection();
        $this->garage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|terrain[]
     */
    public function getTerrain(): Collection
    {
        return $this->terrain;
    }

    public function addTerrain(terrain $terrain): self
    {
        if (!$this->terrain->contains($terrain)) {
            $this->terrain[] = $terrain;
            $terrain->setPhoto($this);
        }

        return $this;
    }

    public function removeTerrain(terrain $terrain): self
    {
        if ($this->terrain->removeElement($terrain)) {
            // set the owning side to null (unless already changed)
            if ($terrain->getPhoto() === $this) {
                $terrain->setPhoto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|studio[]
     */
    public function getStudio(): Collection
    {
        return $this->studio;
    }

    public function addStudio(studio $studio): self
    {
        if (!$this->studio->contains($studio)) {
            $this->studio[] = $studio;
            $studio->setPhoto($this);
        }

        return $this;
    }

    public function removeStudio(studio $studio): self
    {
        if ($this->studio->removeElement($studio)) {
            // set the owning side to null (unless already changed)
            if ($studio->getPhoto() === $this) {
                $studio->setPhoto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|maison[]
     */
    public function getMaison(): Collection
    {
        return $this->maison;
    }

    public function addMaison(maison $maison): self
    {
        if (!$this->maison->contains($maison)) {
            $this->maison[] = $maison;
            $maison->setPhoto($this);
        }

        return $this;
    }

    public function removeMaison(maison $maison): self
    {
        if ($this->maison->removeElement($maison)) {
            // set the owning side to null (unless already changed)
            if ($maison->getPhoto() === $this) {
                $maison->setPhoto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|appartement[]
     */
    public function getAppartement(): Collection
    {
        return $this->appartement;
    }

    public function addAppartement(appartement $appartement): self
    {
        if (!$this->appartement->contains($appartement)) {
            $this->appartement[] = $appartement;
            $appartement->setPhoto($this);
        }

        return $this;
    }

    public function removeAppartement(appartement $appartement): self
    {
        if ($this->appartement->removeElement($appartement)) {
            // set the owning side to null (unless already changed)
            if ($appartement->getPhoto() === $this) {
                $appartement->setPhoto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|garage[]
     */
    public function getGarage(): Collection
    {
        return $this->garage;
    }

    public function addGarage(garage $garage): self
    {
        if (!$this->garage->contains($garage)) {
            $this->garage[] = $garage;
            $garage->setPhoto($this);
        }

        return $this;
    }

    public function removeGarage(garage $garage): self
    {
        if ($this->garage->removeElement($garage)) {
            // set the owning side to null (unless already changed)
            if ($garage->getPhoto() === $this) {
                $garage->setPhoto(null);
            }
        }

        return $this;
    }
}
