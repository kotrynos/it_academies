<?php

declare(strict_types=1);

namespace App\Utils;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Symfony\Component\Uid\Uuid;

class UuidGenerator extends AbstractIdGenerator
{
    /**
     * {@inheritdoc}
     */
    public function generate(EntityManager $em, $entity)
    {
        // SELECT UUID() returns v1 UUID
        return Uuid::v1()->__toString();
    }
}