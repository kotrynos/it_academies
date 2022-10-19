<?php

namespace App\Entity\Collection;

use App\Common\Collection\AbstractCollection;
use App\Entity\Program;

class ProgramCollection extends AbstractCollection
{
    /**
     * @param mixed $element
     */
    protected function supports(mixed $element): bool
    {
        return $element instanceof Program;
    }
}
