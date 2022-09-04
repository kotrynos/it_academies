<?php

declare(strict_types=1);

namespace App\DataProvider;

use App\Repository\CategoryRepository;
use App\Transformer\CategoryEntityToDTOTransformer;

class CategoryDataProvider
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private CategoryEntityToDTOTransformer $entityToDTOTransformer,
    ) {}

    public function findAllCategoryTitles(): array
    {
        return $this->entityToDTOTransformer->transformMany(
            $this->categoryRepository->findAll()
        );
    }
}
