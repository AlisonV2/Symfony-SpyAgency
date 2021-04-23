<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Safeplaces;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SafeplacesFixtures extends Fixture
{

public function load(ObjectManager $manager)
    {
        $safeplacesTypes = ['Appartment', 'City house', 'Country house', 'Hotel', 'Penthouse', 'Villa', 'Boat'];
        $countries = ['France', 'Italy', 'Spain', 'Portugal', 'Germany', 'Belgium'];
                
        for ($i = 0; $i <= 100; $i++) {
            $safeplace = new Safeplaces();
            $faker = Factory::create();
            $safeplace->setIdCode($faker->unique->isbn13);
            $safeplace->setAddress($faker->unique->address);
            $safeplace->setCountry($faker->randomElement($countries));
            $safeplace->setType($faker->randomElement($safeplacesTypes));

            $manager->persist($safeplace);
        }
        $manager->flush();
    }
}