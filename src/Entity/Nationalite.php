<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NationaliteRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=NationaliteRepository::class)
 *  @ApiResource()
 */
class Nationalite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="nationalite")
     */
    private $relation;

    /**
     * @ORM\OneToMany(targetEntity=Auteur::class, mappedBy="relation")
     */
    private $auteurs;

    /**
     * @ORM\OneToMany(targetEntity=Auteur::class, mappedBy="Relation")
     */
    private $auteur;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
        $this->relation = new ArrayCollection();
        $this->auteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Auteur[]
     */
    public function getAuteurs(): Collection
    {
        return $this->auteurs;
    }

    public function addAuteur(Auteur $auteur): self
    {
        if (!$this->auteurs->contains($auteur)) {
            $this->auteurs[] = $auteur;
            $auteur->setRelation($this);
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): self
    {
        if ($this->auteurs->removeElement($auteur)) {
            // set the owning side to null (unless already changed)
            if ($auteur->getRelation() === $this) {
                $auteur->setRelation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Livre $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setNationalite($this);
        }

        return $this;
    }

    public function removeRelation(Livre $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getNationalite() === $this) {
                $relation->setNationalite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Auteur[]
     */
    public function getAuteur(): Collection
    {
        return $this->auteur;
    }
}
