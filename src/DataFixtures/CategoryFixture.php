<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category1->setTitle('Programavimas');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setTitle('Testavimas');
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setTitle('Duomenys');
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setTitle('Web Dizainas');
        $manager->persist($category4);

        $category5 = new Category();
        $category5->setTitle('Kitos skaitmenines programos');
        $manager->persist($category5);

        $manager->flush();
    }
}
