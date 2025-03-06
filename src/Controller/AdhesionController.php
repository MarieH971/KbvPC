<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdhesionController extends AbstractController
{
    #[Route('/adhesion', name: 'app_adhesion')]
    public function index(): Response
    {
        return $this->render('adhesion/adhesion.html.twig', [
            'controller_name' => 'AdhesionController',
        ]);
    }
}
