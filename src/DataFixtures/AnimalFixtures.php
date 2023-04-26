<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Animal;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
class AnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        $animal = new Animal();
        for ($i = 0; $i < 20; $i++) {
            $animal = new animal();
            $animal->setNom('animal '.$i);
            $animal->setEspece('espece'.$i);
            $animal->setCategorie('CATEGORIE'.$i);
            $animal->setCategolink($this->getReference('CategorielaRef'.$i));
            $manager->persist($animal);
        }
        // $manager->persist($product);
            
        $manager->flush();
        
    }
    public function getDependencies()
    {
        return [
            TypeFixtures::class,
        ];
    }
}
