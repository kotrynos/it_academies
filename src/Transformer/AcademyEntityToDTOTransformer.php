<?php

declare(strict_types=1);

namespace App\Transformer;

use App\DTO\Academy;
use App\Entity\Academy as AcademyEntity;

class AcademyEntityToDTOTransformer
{
    /**
     * @param AcademyEntity[] $academies
     * @return Academy[]
     */
    public function transformMany(array $academies): array
    {
        $academyModels = [];

        foreach ($academies as $academy) {
            $academyModels[] = $this->transformSingle($academy);
        }

        return $academyModels;
    }

    public function transformSingle(AcademyEntity $academy): Academy
    {
        return new Academy(
            $academy->getTitle(),
            $academy->getAcademyImageUrl(),
            $academy->getSlug(),
            $academy->getDescription()
        );
    }
}
