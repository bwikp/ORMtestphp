<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ferme;
class FermeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        $ferme = new ferme();
        for ($i = 0; $i < 20; $i++) {
            $ferme = new ferme();
            $ferme->setNom('ferme '.$i);
            $ferme->setVille('ville'.$i);
            $ferme->setCodePostal(mt_rand(6000,12023));
            $manager->persist($ferme);
        }
        // $manager->persist($product);

        $manager->flush();
    }
}
