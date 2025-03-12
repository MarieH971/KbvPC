<?php

namespace App\Controller\Admin;

use App\Enum\UserRole;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardUserController extends AbstractController
{
    #[Route('/dashboard/user', name: 'app_dashboard_user')]
    public function index(): Response
    {
        return $this->render('dashboard/user/index.html.twig', [

        ]);
    }
}

