<?php

declare(strict_types=1);

namespace App\Controller;

use App\Enum\ProgramFilter;
use App\DataProvider\AcademyDataProvider;
use App\DataProvider\ProgramDataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcademyController extends AbstractController
{
    private const DEFAULT_TEMPLATE = 'academies.html.twig';
    private const DEFAULT_TITLE = 'Akademijos/Mokyklos';

    public function __construct(
        private AcademyDataProvider $academyDataProvider,
        private ProgramDataProvider $programDataProvider,
    ) {
    }

    #[Route(path: '/academies/{slug}', name: 'academies', methods: ['GET'])]
    public function handlePrograms(string $slug): Response
    {
        return $this->render(
            self::DEFAULT_TEMPLATE,
            [
                'title' => self::DEFAULT_TITLE,
                'academy' => $this->academyDataProvider->getBySlug($slug),
                'programs' => $this->programDataProvider->findByAcademySlug($slug),
                'filters' => ProgramFilter::DEFAULT_PROGRAMS_FILTER,
            ],
        );
    }
}
