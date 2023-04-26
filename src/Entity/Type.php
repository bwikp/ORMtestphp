<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id ;

    #[ORM\Column(length: 255)]
    private ?string $categorie ;

    #[ORM\OneToMany(mappedBy: 'categoLink', targetEntity: Animal::class)]
    private Collection $catego;

    public function __construct()
    {
        $this->catego = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getCatego(): Collection
    {
        return $this->catego;
    }

    public function addCatego(Animal $catego): self
    {
        if (!$this->catego->contains($catego)) {
            $this->catego->add($catego);
            $catego->setCategoLink($this);
        }

        return $this;
    }

    public function removeCatego(Animal $catego): self
    {
        if ($this->catego->removeElement($catego)) {
            // set the owning side to null (unless already changed)
            if ($catego->getCategoLink() === $this) {
                $catego->setCategoLink(null);
            }
        }

        return $this;
    }
}
