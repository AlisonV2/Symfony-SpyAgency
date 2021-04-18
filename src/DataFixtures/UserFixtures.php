<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      
        $user = new User();
        $user->setUsername('Admin');
        $user->setName('Vandromme');
        $user->setFirstName('Alison');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('alison.vandromme@gmail.com');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$ZDdZYXYzSldxdXZacDFOLw$+eqDPu+9FlMYlzrJ4oy6ntyptpnu48BTVs2lxCzFfh0');
        $user->setCreatedAt(new DateTime('now'));

        $manager->persist($user);

        $manager->flush();
    }
}