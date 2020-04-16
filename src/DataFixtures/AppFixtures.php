<?php

namespace App\DataFixtures;

use App\Entity\Maison;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        /*$maison = new Maison(); 
        $maison->setSurface(100); 
        $maison->setPieces(6); 
        $maison->setJardin(true); 
        $maison->setChambres(3); 
        $maison->setGarage(false); 
        $maison->setLocalisation('Boulogne-sur-mer'); 
        $manager->persist($maison); 
        */

        // autre methode, de faire une boucle  pour faire plusieurs maison pareil, pour la base de données, c'est pas super pour les maison mais c'est pour un exemple


        for($i = 1 ; $i <= 5; $i++){

        $maison = new Maison(); 
        $maison->setSurface(70); 
        $maison->setPieces(5); 
        $maison->setJardin(true); 
        $maison->setChambres(3); 
        $maison->setGarage(false); 
        $maison->setLocalisation('ville'.$i); 
        $maison->setTitre('titreMaison '.$i); 
        $manager->persist($maison); 
        
        $manager->flush();
    }

    //$manager->flush();
    }
}
//mettre un signe devant (AppFixtures.php pour pas que quand ont mettent php bin/console doctrine:fixtures:load --append) dans le terminal, il nous compte 2 fois la meme choses.