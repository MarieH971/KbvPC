<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;

use App\Enum\Session;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        
        $reservation = new Reservation($this->getUser(), Session::SESSION1); // Par défaut, un créneau est choisi
        $form = $this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            
            $entityManager->persist($reservation);
            $entityManager->flush();

            // Message de succès
            $this->addFlash('success', 'Votre réservation a été enregistrée.');

            return $this->redirectToRoute('app_home'); 
        }

        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'ReservationController',
        ]);
    }




}
