<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Client;

class CliFix extends Fixture
{
    public function load(ObjectManager $manager)
    {
       for($i=1;$i<11;$i++){
           $c=new Client();
           $c->setNom("nom n$i")
             ->setPrenom("prenom n$i")
             ->setAdresse("adresse n$i")
             ->setEmail("nom$i@gmail.com");
        $manager->persist($c);
       }

        $manager->flush();
    }
}
