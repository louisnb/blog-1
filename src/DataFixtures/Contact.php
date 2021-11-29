<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $contacts = [
            new \App\Entity\Contact("Laurent", true, "Seydou"),
            new \App\Entity\Contact("Quentin",true, "Martin")
        ];

        foreach ($contacts as $contact)
        {
            $manager->persist($contact);
        }




        $manager->flush();
    }
}
