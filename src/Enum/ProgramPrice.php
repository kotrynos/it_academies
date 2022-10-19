<?php

declare(strict_types=1);

namespace App\Enum;

class ProgramPrice
{
    public const FREE = '0';
    public const MIN = '500';
    public const MAX = '1000';

    /**
     * Do Not Instantiate This Class
     */
    public function __construct()
    {
    }
}
