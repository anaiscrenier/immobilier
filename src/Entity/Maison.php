<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaisonRepository")
 */
class Maison
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     */
    private $pieces;

    /**
     * @ORM\Column(type="boolean")
     */
    private $jardin;

    /**
     * @ORM\Column(type="integer")
     */
    private $chambres;

    /**
     * @ORM\Column(type="boolean")
     */
    private $garage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=999, nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img_1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img_3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alt_1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alt_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alt_3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPieces(): ?int
    {
        return $this->pieces;
    }

    public function setPieces(int $pieces): self
    {
        $this->pieces = $pieces;

        return $this;
    }

    public function getJardin(): ?bool
    {
        return $this->jardin;
    }

    public function setJardin(bool $jardin): self
    {
        $this->jardin = $jardin;

        return $this;
    }

    public function getChambres(): ?int
    {
        return $this->chambres;
    }

    public function setChambres(int $chambres): self
    {
        $this->chambres = $chambres;

        return $this;
    }

    public function getGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(bool $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImg1(): ?string
    {
        return $this->img_1;
    }

    public function setImg1(?string $img_1): self
    {
        $this->img_1 = $img_1;

        return $this;
    }

    public function getImg2(): ?string
    {
        return $this->img_2;
    }

    public function setImg2(?string $img_2): self
    {
        $this->img_2 = $img_2;

        return $this;
    }

    public function getImg3(): ?string
    {
        return $this->img_3;
    }

    public function setImg3(?string $img_3): self
    {
        $this->img_3 = $img_3;

        return $this;
    }

    public function getAlt1(): ?string
    {
        return $this->alt_1;
    }

    public function setAlt1(?string $alt_1): self
    {
        $this->alt_1 = $alt_1;

        return $this;
    }

    public function getAlt2(): ?string
    {
        return $this->alt_2;
    }

    public function setAlt2(?string $alt_2): self
    {
        $this->alt_2 = $alt_2;

        return $this;
    }

    public function getAlt3(): ?string
    {
        return $this->alt_3;
    }

    public function setAlt3(?string $alt_3): self
    {
        $this->alt_3 = $alt_3;

        return $this;
    }
}
