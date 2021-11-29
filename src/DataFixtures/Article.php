<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Article extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $article = new \App\Entity\Article();
        $article->setnom("Le plus beau match");
        $article->setSlug("AM");
        $article->setContenu("Quel match incroyable!");



        $manager->persist($article);
        $manager->flush();
    }
}
