<?php

declare(strict_types=1);

namespace App\Transformer;

use App\DTO\Category;
use App\Entity\Category as CategoryEntity;
use App\Resolver\CategorySlugResolver;

class CategoryEntityToDTOTransformer
{
    public function __construct(private CategorySlugResolver $slugResolver)
    {}

    /**
     * @param CategoryEntity[] $categories
     * @return Category[]
     */
    public function transformMany(array $categories): array
    {
        $categoryModels = [];

        foreach ($categories as $category) {
            $title = $category->getTitle();

            $categoryModels[] = new Category($title, $this->slugResolver->resolve($title));
        }

        return $categoryModels;
    }
}
