<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\DataPersister\ProgramDataPersister;
use App\DataProvider\AcademyDataProvider;
use App\Transformer\ProgramRequestToDTOTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateProgramController extends AbstractController
{
    public function __construct(
        private AcademyDataProvider $academyDataProvider,
        private ProgramRequestToDTOTransformer $transformer,
        private ProgramDataPersister $dataPersister,
    ) {
    }

    #[Route(path: '/api/admin/program', name: 'api_admin_program', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $academy = $this->academyDataProvider->getAcademyBySlug($request->get('academy'));

        if ($academy === null) {
            return $this->json([
                'status' => 'error',
                'message' => 'Academy was not found',
            ]);
        }

        $this->dataPersister->createNewProgramFromModel($this->transformer->transform($request, $academy));

        return $this->json([
            'status' => 'success',
        ]);
    }
}
