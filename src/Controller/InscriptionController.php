<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(): Response
    {
        return $this->render('inscription/inscription.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }
}
