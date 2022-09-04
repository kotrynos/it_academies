<?php

declare(strict_types=1);

namespace App\Resolver;

class IncomingPriceParamResolver
{
    public function resolve(string $priceParam): string
    {
        return match ($priceParam) {
            '1', '2' => '<',
            '3' => '>',
            '4' => 'kompensuojama UZT',
        };
    }
}