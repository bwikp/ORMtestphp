<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Type;
#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $nom;

    #[ORM\Column(length: 255)]
    private ?string $espece ;

    private ?string     $categorie;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $Categolink = null;

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setCategorie($categorie)
        {
            $this->categorie = $categorie;
        }
    public function getCategorie()
        {
            return $this->categorie;
        }
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getEspece()
    {
        return $this->espece;
    }

    public function setEspece(string $espece)
    {
        $this->espece = $espece;
    }

    public function getCategolink(): ?Type
    {
        return $this->Categolink;
    }

    public function setCategolink(?Type $Categolink): self
    {
        $this->Categolink = $Categolink;

        return $this;
    }

}
