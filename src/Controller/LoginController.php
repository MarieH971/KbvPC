<?php

namespace App\Controller;

use App\Form\LoginType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Attribute\Route;



final class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        if ($this->getUser()) {
            $this->addFlash('success', 'Vous êtes déjà connecté, vous allez être redirigé vers la page d\'accueil.');
            return $this->redirectToRoute('app_home');
        }


        // Créer le formulaire de connexion
        $form = $this->createForm(LoginType::class);

        // Récupérer les erreurs éventuelles
        $error = $authenticationUtils->getLastAuthenticationError();

        // Récupérer le dernier email saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        // Si le formulaire est soumis et valide, gérer la connexion
        if ($form->isSubmitted() && $form->isValid()) {
            // Il n'est généralement pas nécessaire de traiter directement la connexion
            // puisque Symfony gère la redirection après une soumission valide
            return $this->redirectToRoute('app_home'); // Modifier avec la route après connexion
        }

        // Rendu du formulaire de connexion avec erreurs et le dernier email
        return $this->render('login/login.html.twig', [
            'form' => $form->createView(),
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Symfony gère automatiquement la déconnexion
    }
}