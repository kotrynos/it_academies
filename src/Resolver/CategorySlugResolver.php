<?php

declare(strict_types=1);

namespace App\Resolver;

use App\Enum\ProgramTitle;

class CategorySlugResolver
{
    public function resolve(string $title): ?string
    {
        return match ($title) {
            ProgramTitle::PROGRAMMING => 'programming',
            ProgramTitle::TESTING => 'testing',
            ProgramTitle::DATA => 'data',
            ProgramTitle::DESIGN => 'design',
            ProgramTitle::OTHER => 'other',
            default => null,
        };
    }
}
