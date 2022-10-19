<?php

declare(strict_types=1);

namespace App\Controller;

use App\DataProvider\ProgramDataProvider;
use App\Resolver\ProgramFilterResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    private const DEFAULT_TEMPLATE = 'programs.html.twig';
    private const DEFAULT_TITLE = 'Programos';

    public function __construct(
        private ProgramFilterResolver $programFilterResolver,
        private ProgramDataProvider $programDataProvider,
    ) {
    }

    #[Route(path: '/programs/{slug}', name: 'programs', methods: ['GET'])]
    public function __invoke(string $slug): Response
    {
        return $this->render(
            self::DEFAULT_TEMPLATE,
            [
                'title' => self::DEFAULT_TITLE,
                'filters' => $this->programFilterResolver->resolve($slug),
                'programs' => $this->programDataProvider->findByCategory($slug),
                'slug' => $slug,
            ],
        );
    }
}
