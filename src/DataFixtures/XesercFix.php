<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Reservation;

class XesercFix extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $manager->flush();
    }
}
