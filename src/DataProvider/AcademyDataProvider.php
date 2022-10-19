<?php

declare(strict_types=1);

namespace App\DataProvider;

use App\DTO\Academy;
use App\Entity\Academy as AcademyEntity;
use App\Repository\AcademyRepository;
use App\Transformer\AcademyEntityToDTOTransformer;

class AcademyDataProvider
{
    public function __construct(
        private AcademyRepository $academyRepository,
        private AcademyEntityToDTOTransformer $entityToDTOTransformer,
    ) {
    }

    /**
     * @return Academy[]
     */
    public function findAllAcademies(): array
    {
        return $this->entityToDTOTransformer->transformMany(
            $this->academyRepository->findAll()
        );
    }

    public function getBySlug(string $slug): Academy
    {
        return $this->entityToDTOTransformer->transformSingle(
            $this->academyRepository->getBySlug($slug)
        );
    }

    public function getAcademyBySlug(string $slug): AcademyEntity
    {
        return $this->academyRepository->getBySlug($slug);
    }
}
