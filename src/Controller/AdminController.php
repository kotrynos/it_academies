<?php

declare(strict_types=1);

namespace App\Controller;

use App\Constant\ProgramName;
use App\DataProvider\AcademyDataProvider;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    private const DEFAULT_TEMPLATE = 'admin.html.twig';
    private const DEFAULT_TITLE = 'admin';
    private const DEFAULT_PROGRAM_TEMPLATE = 'admin_program.html.twig';

    public function __construct(private AcademyDataProvider $academyDataProvider)
    {
    }

    #[Route(path: '/admin', name: 'admin', methods: ['GET'])]
    public function handleAdminView(): Response
    {
        return $this->render(
            self::DEFAULT_TEMPLATE,
            [
                'title' => self::DEFAULT_TITLE,
            ]
        );
    }

    #[Route(path: '/admin/program', name: 'admin_program', methods: ['GET'])]
    public function handleAdminProgramView(): Response
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
