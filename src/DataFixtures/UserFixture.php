<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends AbstractUserFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setEmail('test@test.com');
        $user1->setRoles(['ROLE_USER']);
        $user1->setFirstName('Kotryna');

        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('test1@test.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setFirstName('Kotryna 1');

        $manager->persist($user2);
        $manager->flush();
    }
}
