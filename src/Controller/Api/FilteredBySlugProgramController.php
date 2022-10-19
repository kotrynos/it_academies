<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\DataProvider\ProgramDataProvider;
use App\DTO\AcademyFilterRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FilteredBySlugProgramController extends AbstractController
{
    public function __construct(private ProgramDataProvider $programDataProvider)
    {
    }

    #[Route(path: '/api/academy/{slug}/programs/filter', name: 'api_academy_programs_filter', methods: ['POST'])]
    public function __invoke(Request $request, string $slug): JsonResponse
    {
        return $this->json(
            [
                'status' => 'success',
                'data' => $this->programDataProvider->findByAcademySlugAndFilters(
                    new AcademyFilterRequest(
                        $slug,
                        $request->get('programs'),
                        $request->get('city'),
                        $request->get('price'),
                    )
                ),
            ],
        );
    }
}
