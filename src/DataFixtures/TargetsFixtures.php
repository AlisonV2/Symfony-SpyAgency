<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Targets;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TargetsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $countries = ['France', 'Italy', 'Spain', 'Portugal', 'Germany', 'Belgium'];
                        
        for ($i = 0; $i <= 50; $i++) {
            $target = new Targets();
            $faker = Factory::create();
            $target->setName($faker->lastName);
            $target->setFirstName($faker->firstName);
            $target->setBirthday($faker->dateTimeBetween($startDate = '-60 years', $endDate = 'now', $timezone = null));
            $target->setAlias($faker->unique->colorName);
            $target->setCountry($faker->randomElement($countries));

            $manager->persist($target);
        }
        $manager->flush();
    }
}