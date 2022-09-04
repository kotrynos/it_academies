<?php

declare(strict_types=1);

namespace App\Controller;

use App\DataProvider\ProgramDataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingleProgramController extends AbstractController
{
    private const DEFAULT_TEMPLATE = 'single_program.html.twig';
    private const DEFAULT_TITLE = 'Pasirinkta programa';

    public function __construct(private ProgramDataProvider $programDataProvider)
    {
    }

    #[Route(path: '/programs/program/{id}', name: 'programs_program', methods: ['GET'])]
    public function __invoke(string $id): Response
    {
        return $this->render(
            self::DEFAULT_TEMPLATE,
            [
                'title' => self::DEFAULT_TITLE,
                'program' => $this->programDataProvider->getById($id),
            ],
        );
    }
}
