<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Service;

class SerFix extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=1;$i<11;$i++){
            $s=new Service();
            $s->setLibelle("Libelle n$i")
              ->setDiscreption("description n$i");
         $manager->persist($s);}

        $manager->flush();
    }
}
