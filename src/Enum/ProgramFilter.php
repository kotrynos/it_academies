<?php

declare(strict_types=1);

namespace App\Enum;

class ProgramFilter
{
    public const DEFAULT_FILTERS_CITY = [
        'title' => 'Miestas',
        'options' => ['Vilnius', 'Kaunas', 'Klaipeda', 'Online'],
    ];

    public const DEFAULT_FILTERS_PRICE = [
        'title' => 'Kaina',
        'options' => ['iki 500', 'iki 1000 ', 'nuo 1000', 'kompensuojama UZT'],
        'options_values' => ['500', '1000', '1000', 'kompensuojama UZT'],
    ];

    public const PROGRAMMING_FILTER = [
        [
            'title' => 'Programos',
            'options' => ['PHP', 'C+', 'Java'],
        ],
        self::DEFAULT_FILTERS_CITY,
        self::DEFAULT_FILTERS_PRICE,
    ];

    public const TESTING_FILTER = [
        self::DEFAULT_FILTERS_CITY,
        self::DEFAULT_FILTERS_PRICE,
    ];

    public const OTHER_PROGRAMS_FILTER = [
        [
            'title' => 'Programos',
            'options' => ['SEO', 'dirbtinis intelektas', 'agile', 'cyber security'],
        ],
        self::DEFAULT_FILTERS_CITY,
        self::DEFAULT_FILTERS_PRICE,
    ];

    public const DEFAULT_PROGRAMS_FILTER = [
        self::DEFAULT_FILTERS_CITY,
        self::DEFAULT_FILTERS_PRICE,
    ];

    /**
     * Do Not Instantiate This Class
     */
    public function __construct()
    {
    }
}
