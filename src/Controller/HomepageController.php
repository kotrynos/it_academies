<?php

declare(strict_types=1);

namespace App\Controller;

use App\DataProvider\AcademyDataProvider;
use App\DataProvider\CategoryDataProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    private const DEFAULT_TEMPLATE = 'homepage.html.twig';
    private const DEFAULT_TITLE = 'LT IT akademijos';

    public function __construct(
        private CategoryDataProvider $categoryDataProvider,
        private AcademyDataProvider $academyDataProvider,
    ) {
    }

    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function __invoke(): Response
    {
        return $this->render(
            self::DEFAULT_TEMPLATE,
            [
                'title' => self::DEFAULT_TITLE,
                'categories' => $this->categoryDataProvider->findAllCategoryTitles(),
                'academies' => $this->academyDataProvider->findAllAcademies(),
            ]
        );
    }
}
