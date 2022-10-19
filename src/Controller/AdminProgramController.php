<?php

declare(strict_types=1);

namespace App\Controller;

use App\Enum\ProgramName;
use App\DataProvider\AcademyDataProvider;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class AdminProgramController extends AbstractController
{
    private const DEFAULT_TITLE = 'Aministravimo skydas';
    private const DEFAULT_PROGRAM_TEMPLATE = 'admin_program.html.twig';

    public function __construct(private AcademyDataProvider $academyDataProvider)
    {
    }

    #[Route(path: '/admin/program', name: 'admin_program', methods: ['GET'])]
    public function __invoke(): Response
    {
        return $this->render(
            self::DEFAULT_PROGRAM_TEMPLATE,
            [
                'title' => self::DEFAULT_TITLE,
                'academies' => $this->academyDataProvider->findAllAcademies(),
                'categories' => ProgramName::PROGRAM_CATEGORIES,
            ]
        );
    }
}
