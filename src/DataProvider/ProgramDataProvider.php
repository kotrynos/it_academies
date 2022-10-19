<?php

declare(strict_types=1);

namespace App\DataProvider;

use App\DTO\AcademyFilterRequest;
use App\DTO\Program;
use App\DTO\ProgramFilterRequest;
use App\Exception\ProgramNotFoundException;
use App\Repository\ProgramRepository;
use App\Transformer\ProgramEntityToDTOTransformer;

class ProgramDataProvider
{
    public function __construct(
        private ProgramRepository $programRepository,
        private ProgramEntityToDTOTransformer $programEntityToDTOTransformer,
    ) {
    }

    public function findByCategory(string $category): array
    {
        return $this->programEntityToDTOTransformer->transformMany(
            $this->programRepository->findByCategory($category)
        );
    }

    /**
     * @return array
     */
    public function findByFilters(ProgramFilterRequest $filterRequest): array
    {
        return $this->programEntityToDTOTransformer->transformMany(
            $this->programRepository->findByFilters($filterRequest)
        );
    }

    /**
     * @return array
     */
    public function findByAcademySlug(string $academySlug): array
    {
        return $this->programEntityToDTOTransformer->transformMany(
            $this->programRepository->findByAcademySlug($academySlug)
        );
    }

    /**
     * @return array
     */
    public function findByAcademySlugAndFilters(AcademyFilterRequest $filterRequest): array
    {
        return $this->programEntityToDTOTransformer->transformMany(
            $this->programRepository->findByAcademySlugAndFilters($filterRequest)
        );
    }

    public function getById(string $id): ?Program
    {
        try {
            return $this->programEntityToDTOTransformer->transformSingle(
                $this->programRepository->getById($id)
            );
        } catch (ProgramNotFoundException) {
            return null;
        }
    }
}
