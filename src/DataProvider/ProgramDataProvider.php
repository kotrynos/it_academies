<?php

declare(strict_types=1);

namespace App\DataProvider;

use App\DTO\Program;
use App\Exception\ProgramNotFoundException;
use App\Repository\ProgramRepository;
use App\Transformer\ProgramEntityToDTOTransformer;

class ProgramDataProvider
{
    public function __construct(
        private ProgramRepository $programRepository,
        private ProgramEntityToDTOTransformer $programEntityToDTOTransformer,
    ) {}

    public function findByCategory(string $category): array
    {
        return $this->programEntityToDTOTransformer->transformMany(
            $this->programRepository->findByCategory($category)
        );
    }

    /**
     * @return array
     */
    public function findByFilters(
        ?string $title,
        string $city,
        string $price,
        string $slug
    ): array {
        return $this->programEntityToDTOTransformer->transformMany(
            $this->programRepository->findByFilters($title, $city, $price, $slug)
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
    public function findByAcademySlugAndFilters(
        string $slug,
        string $program,
        string $city,
        string $price
    ): array {
        return $this->programEntityToDTOTransformer->transformMany(
            $this->programRepository->findByAcademySlugAndFilters($slug, $program, $city, $price)
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
