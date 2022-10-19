<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\DataProvider\ProgramDataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FilteredProgramController extends AbstractController
{
    public function __construct(private ProgramDataProvider $programDataProvider)
    {
    }

    #[Route(path: '/api/programs/filter', name: 'api_programs_filter', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        return $this->json([
            'status' => 'success',
            'data' => $this->programDataProvider->findByFilters(
                $request->get('Programos'),
                $request->get('Miestas'),
                $request->get('Kaina'),
                $request->get('slug'),
            ),
        ]);
    }
}
