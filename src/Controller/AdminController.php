<?php

declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    private const DEFAULT_TEMPLATE = 'admin.html.twig';
    private const DEFAULT_TITLE = 'Aministravimo skydas';


    #[Route(path: '/admin', name: 'admin', methods: ['GET'])]
    public function __invoke(): Response
    {
        return $this->render(
            self::DEFAULT_TEMPLATE,
            [
                'title' => self::DEFAULT_TITLE,
            ],
        );
    }
}
