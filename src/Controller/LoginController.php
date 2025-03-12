<?php

namespace App\Controller;

use App\Form\LoginType;
use App\Entity\User;


// use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
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
    public function login(
//        Request $request,
        AuthenticationUtils $authenticationUtils,
        EntityManagerInterface $entityManager
    ): Response {
        // Si l'utilisateur est déjà connecté, redirection vers la page d'accueil avec un message
        if ($this->getUser()) {
            $this->addFlash('success', 'Vous êtes déjà connecté !');
            return $this->redirectToRoute('app_home');
        }

        // Créer et traiter le formulaire de connexion
//        $form = $this->createForm(LoginType::class);
//        $form->handleRequest($request);

        // Récupérer les erreurs éventuelles et le dernier email saisi
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

//        // Si le formulaire est soumis et valide
//        if ($form->isSubmitted() && $form->isValid()) {
//            // Récupérer les données du formulaire
//            $data = $form->getData();
//            $email = $data['email'];
//            $password = $data['password'];
//
//            // Rechercher l'utilisateur dans la base de données
//            $user = $entityManager->getRepository(User::class)->findOneByEmail($email);
//
//            // Vérifier si l'utilisateur existe
//            if (!$user) {
//                $this->addFlash('error', 'Aucun utilisateur trouvé avec cet email.');
//            } else {
//                // Vérifier si le mot de passe est correct
//                $passwordHasher = $this->container->get('security.password_hasher');
//                if ($passwordHasher->isPasswordValid($user, $password)) {
//                    // Redirection vers la page d'accueil si les informations sont correctes
//                    return $this->redirectToRoute('app_home');
//                } else {
//                    $this->addFlash('error', 'Le mot de passe est incorrect.');
//                }
//            }
//        }

        // Afficher le formulaire de connexion avec erreurs et le dernier email saisi
        return $this->render('login/login.html.twig', [
//            'form' => $form->createView(),
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
