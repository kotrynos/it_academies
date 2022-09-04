<?php

declare(strict_types=1);

namespace App\DataPersister;

use App\DTO\Academy;
use App\Entity\Academy as AcademyEntity;
use Doctrine\ORM\EntityManagerInterface;

class AcademyDataPersister
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createNewAcademyFromModel(Academy $academy): void
    {
        $academyEntity = new AcademyEntity();

        $academyEntity->setSlug($academy->getSlug());
        $academyEntity->setTitle($academy->getTitle());
        $academyEntity->setAcademyImageUrl($academy->getAcademyImageUrl());
        $academyEntity->setDescription($academy->getDescription());
        $academyEntity->setAcademyUrl($academy->getAcademyUrl());

        $this->entityManager->persist($academyEntity);
        $this->entityManager->flush();
    }
}
