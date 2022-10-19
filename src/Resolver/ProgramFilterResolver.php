<?php

declare(strict_types=1);

namespace App\Resolver;

use App\Constant\ProgramName;
use App\Constant\ProgramFilter;

class ProgramFilterResolver
{
    public function resolve(string $slug): array
    {
        return match ($slug) {
            ProgramName::PROGRAMMING => ProgramFilter::PROGRAMMING_FILTER,
            ProgramName::TESTING, ProgramName::DESIGN, ProgramName::DATA => ProgramFilter::TESTING_FILTER,
            ProgramName::OTHER => ProgramFilter::OTHER_PROGRAMS_FILTER,
            default => [],
        };
    }
}
