<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\DataProvider\ProgramDataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ResetProgramFilterController extends AbstractController
{
    public function __construct(private ProgramDataProvider $programDataProvider)
    {
    }

    #[Route(path: '/api/programs/filter/reset/{slug}', name: 'api_programs_filter_reset', methods: ['GET'])]
    public function __invoke(Request $request, string $slug): JsonResponse
    {
        return $this->json(
            [
                'status' => 'success',
                'data' => $this->programDataProvider->findByCategory($slug),
            ],
        );
    }
}
