<?php

namespace App\Controller;

use App\Entity\User;
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
        $action = $this->generateUrl('app_user_new');
        return $this->handleForm($request, $entityManager, $passwordHasher, $action, $user, 'app_user_list');
    }

    protected function handleForm(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
        string $action,
        User $user,
        ?string $redirect = null,

    ): Response {
        $form = $this->createForm(UserType::class, $user, ['action' => $action, 'method' => 'POST']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $plainPassword = $user->getPassword();
            $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);


            $entityManager->persist($user);
            $entityManager->flush();


            return $redirect
                ? $this->redirectToRoute($redirect, [], Response::HTTP_SEE_OTHER)
                : $this->redirectToRoute('app_user_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('inscription/formulaire.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}
