<?php

namespace App\Entity;

use App\Repository\PretRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PretRepository::class)
 */
class Pret
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
    private $datePret;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRetourPrevue;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRetourReelle;

    /**
     * @ORM\ManyToOne(targetEntity=Adherent::class, inversedBy="relation")
     */
    private $adherent;

    /**
     * @ORM\ManyToOne(targetEntity=Livre::class, inversedBy="prets")
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePret(): ?\DateTimeInterface
    {
        return $this->datePret;
    }

    public function setDatePret(\DateTimeInterface $datePret): self
    {
        $this->datePret = $datePret;

        return $this;
    }

    public function getDateRetourPrevue(): ?\DateTimeInterface
    {
        return $this->dateRetourPrevue;
    }

    public function setDateRetourPrevue(\DateTimeInterface $dateRetourPrevue): self
    {
        $this->dateRetourPrevue = $dateRetourPrevue;

        return $this;
    }

    public function getDateRetourReelle(): ?\DateTimeInterface
    {
        return $this->dateRetourReelle;
    }

    public function setDateRetourReelle(\DateTimeInterface $dateRetourReelle): self
    {
        $this->dateRetourReelle = $dateRetourReelle;

        return $this;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?Adherent $adherent): self
    {
        $this->adherent = $adherent;

        return $this;
    }

    public function getRelation(): ?Livre
    {
        return $this->relation;
    }

    public function setRelation(?Livre $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
