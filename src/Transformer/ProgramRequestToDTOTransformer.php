<?php

declare(strict_types=1);

namespace App\Transformer;

use App\Entity\Academy;
use App\DTO\InternalProgram;
use Symfony\Component\HttpFoundation\Request;

class ProgramRequestToDTOTransformer
{
    public function transform(Request $request, Academy $academy): InternalProgram
    {
        return new InternalProgram(
            $academy,
            $request->get('title'),
            $request->get('category'),
            $request->get('price'),
            $request->get('city'),
            $request->get('description')
        );
    }
}
