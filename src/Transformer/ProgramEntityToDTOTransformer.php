<?php

declare(strict_types=1);

namespace App\Transformer;

use App\DTO\Program;
use App\Entity\Program as ProgramEntity;

class ProgramEntityToDTOTransformer
{
    /**
     * @param ProgramEntity[] $programs
     * @return Program[]
     */
    public function transformMany(array $programs): array
    {
        $programModels = [];

        foreach ($programs as $program) {
            $programModels[] = $this->transformSingle($program);
        }

        return $programModels;
    }

    public function transformSingle(ProgramEntity $program): Program
    {
        return new Program(
            $program->getTitle(),
            $program->getAcademy()->getAcademyImageUrl(),
            $program->getStartsAt(),
            $program->getProgramCategory(),
            $program->getId(),
            $program->getDescription()
        );
    }
}
