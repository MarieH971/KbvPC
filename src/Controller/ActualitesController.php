<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ActualitesController extends AbstractController
{
    #[Route('/actualites', name: 'app_actualites')]
    public function index(): Response
    {
        return $this->render('actualites/actualites.html.twig', [
            'controller_name' => 'ActualitesController',
        ]);
    }
}
