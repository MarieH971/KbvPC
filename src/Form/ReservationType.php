<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\User;
use App\Enum\Session;
use App\Enum\ReservationStatus;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', EntityType::class, [
            'class' => User::class,
            'choice_label' => fn(User $user) => $user->getFirstName() . ' ' . $user->getLastName(),
            'label' => 'User',
            'placeholder' => 'Select a user',
            'attr' => [
                'class' => 'form-select',
                ],
            ])

            ->add('session', ChoiceType::class, [
                'label'        => 'Niveau',
                'choices'      => array_combine(
                    array_map(fn($session) => $session->value, Session::cases()),
                    Session::cases()
                ),
                'choice_label' => fn(Session $session) => $session->value,
                'placeholder'  => 'Choisissez le niveau',
            ])
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Reservation Status',
                'choices' => array_combine(
                    array_map(fn($status) => $status->value, ReservationStatus::cases()),
                    ReservationStatus::cases()
                ),
                'choice_label' => fn(ReservationStatus $status) => $status->value,
                'placeholder' => 'Select a status',
                'attr' => [
                    'class' => 'form-select',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
