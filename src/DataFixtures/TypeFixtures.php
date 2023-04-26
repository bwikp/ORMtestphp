<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Type;
class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        for ($i = 0; $i < 20; $i++) {
            $type = new Type();
            $type->setCategorie('CATEGORIE'.$i);
            $manager->persist($type);
            $this->addReference('CategorielaRef'.$i,$type);
        }
        // $manager->persist($product);

        $manager->flush();
        
    }
    
}