<?php

declare(strict_types=1);

namespace App\DataPersister;

use App\DTO\InternalProgram;
use App\Entity\Program as ProgramEntity;
use Doctrine\ORM\EntityManagerInterface;

class ProgramDataPersister
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createNewProgramFromModel(InternalProgram $programModel): void
    {
        $academy = $programModel->getAcademy();

        $programEntity = new ProgramEntity($academy);
        $programEntity->setDescription($programModel->getDescription());
        $programEntity->setTitle($programModel->getTitle());
        $programEntity->setProgramCategory($programModel->getProgramCategory());
        $programEntity->setPrice($programModel->getPrice());
        $programEntity->setCity($programModel->getCity());

        $this->entityManager->persist($programEntity);

        $academy->addProgram($programEntity);

        $this->entityManager->flush();
    }
}
