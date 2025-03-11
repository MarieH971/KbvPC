<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;


class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'attr' => ['placeholder' => 'Entrer votre Email'],
            'constraints' => [
                new NotBlank(['message' => 'L\'email ne peut pas être vide.']),
                new Email(['message' => 'Veuillez entrer un email valide.']),
            ]
        ])
        ->add('password', PasswordType::class, [
            'label' => 'Mot de passe',
            'attr' => ['placeholder' => 'Entrer votre mot de passe'],
            'constraints' => [
                new NotBlank(['message' => 'Le mot de passe ne peut pas être vide.']),
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Se connecter',
            'attr' => ['class' => 'btn btn-primary'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,// Par défaut, pas d'entité à associer ici
        ]);
    }


}