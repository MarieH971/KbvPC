<?php

    namespace App\Controller\Admin;

    use App\Enum\UserRole;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Attribute\Route;

    final class DashboardController extends AbstractController
    {
        #[Route('/dashboard', name: 'app_dashboard')]
        public function index(): Response
        {
            $user = $this->getUser();

            return match ($user->getRoles()[0]) {
                UserRole::ROLE_USER->name => $this->redirectToRoute('app_dashboard_user'),
                UserRole::ROLE_ADMIN->name => $this->redirectToRoute('app_dashboard_admin')
            };
        }
    }

