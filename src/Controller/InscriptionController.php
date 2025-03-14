<?php

namespace App\Controller;

use App\Entity\User;
use App\Enum\UserRole;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
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


    #[Route('/inscription/formulaire', name: 'app_inscription_form', methods: ['GET', 'POST'])]
    public function inscriptionForm(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {
        $user = new User();
        $user->setUserRole(UserRole::ROLE_USER);
        $user->setRegistrationDate(new \DateTimeImmutable('now'));


        $form = $this->createForm(UserType::class, $user, [
            'action' => $this->generateUrl('app_inscription_form'),
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $plainPassword = $user->getPassword();
            $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);


            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre inscription a été envoyé avec succès !');

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('inscription/formulaire.html.twig', [
            'form' => $form,
            'user' => $user,
        ]);
    }
}
