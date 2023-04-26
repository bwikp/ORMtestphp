<?php

namespace App\Entity;

use App\Repository\FermeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FermeRepository::class)]
class Ferme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id ;

    #[ORM\Column(length: 255)]
    private ?string $nom ;

    #[ORM\Column(length: 255)]
    private ?string $ville ;

    #[ORM\Column(length: 255)]
    private ?string $code_postal ;

    // #[ORM\Column(type: Types::ARRAY)]
    // private array $list_enclos = [];

    // public function __construct($nom,$ville,$code_postal)
    //     {

    //         $this->setNom($nom);
    //         $this->setVille($ville);
    //         $this->setCodePostal($code_postal);
    //     }
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille(string $ville)
    {
        $this->ville = $ville;
    }

    public function getCodePostal()
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal)
    {
        $this->code_postal = $code_postal;
    }
}
