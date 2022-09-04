<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\DataPersister\AcademyDataPersister;
use App\Transformer\AcademyRequestToDTOTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewAcademyController extends AbstractController
{
    public function __construct(
        private AcademyRequestToDTOTransformer $transformer,
        private AcademyDataPersister $dataPersister,
    ) {
    }

    #[Route(path: '/api/admin/academy/create', name: 'api_admin_academy_create', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $this->dataPersister->createNewAcademyFromModel(
            $this->transformer->transform($request)
        );

        return $this->json([
            'status' => 'success',
        ]);
    }
}
