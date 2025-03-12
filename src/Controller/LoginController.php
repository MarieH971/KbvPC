<?php

namespace App\Controller;

use App\Form\LoginType;
use App\Entity\User;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;



final class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils)
    {
        // Si l'utilisateur est déjà connecté, redirection vers la page d'accueil avec un message
        if ($this->getUser()) {
            $this->addFlash('success', 'Vous êtes déjà connecté !');
            return $this->redirectToRoute('app_home');
        }

      
        // Récupérer les erreurs éventuelles et le dernier email saisi
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

      
                    

        // Afficher le formulaire de connexion avec erreurs et le dernier email saisi
        return $this->render('login/login.html.twig', [
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
