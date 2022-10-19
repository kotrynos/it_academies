<?php

declare(strict_types=1);

namespace App\Enum;

class ProgramName
{
    public const PROGRAMMING = 'programming';
    public const TESTING = 'testing';
    public const DATA = 'data';
    public const DESIGN = 'design';
    public const OTHER = 'other';

    public const PROGRAM_CATEGORIES = [
        self::PROGRAMMING,
        self::DESIGN,
        self::OTHER,
        self::TESTING,
        self::DATA,
    ];

    /**
     * Do Not Instantiate This Class
     */
    public function __construct()
    {
    }
}
