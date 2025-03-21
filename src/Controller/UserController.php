<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('user', name: 'app_user_')]
class UserController extends AbstractController
{
    #[Route('/list', name: 'list', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {
        $user = new User();
        $action = $this->generateUrl('app_user_new');
        return $this->handleForm($request, $entityManager, $passwordHasher, $action, $user, 'app_user_list');
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $action = $this->generateUrl('app_user_edit', ['id' => $user->getId()]);
        return $this->handleForm($request, $entityManager, $passwordHasher, $action, $user, 'app_user_list');
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_list', [], Response::HTTP_SEE_OTHER);
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

        return $this->render('user/_form.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}
