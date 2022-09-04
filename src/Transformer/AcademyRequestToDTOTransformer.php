<?php

declare(strict_types=1);

namespace App\Transformer;

use App\DTO\Academy;
use Symfony\Component\HttpFoundation\Request;

class AcademyRequestToDTOTransformer
{
    public function transform(Request $request): Academy
    {
        return new Academy(
            $request->get('title'),
            $request->get('academyImageUrl'),
            $request->get('slug'),
            $request->get('description'),
            $request->get('academyUrl')
        );
    }
}
