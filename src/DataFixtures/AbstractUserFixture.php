<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

abstract class AbstractUserFixture extends Fixture implements FixtureGroupInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getGroups(): array
    {
        return ['userFixture'];
    }
}
