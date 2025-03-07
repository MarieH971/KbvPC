<?php

namespace App\Form;

use App\Entity\User;
use App\Enum\UserRole;
use App\Enum\Level;
use App\Form\Transformer\UserRoleTransformer;
use App\Form\Transformer\LevelTransformer;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('photo', FileType::class, [
                'mapped' => false,
                'required' => false,
            ])
            ->add('phone')
            ->add('email', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email(),
                ],
            ])


            ->add('password', PasswordType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 6]),
                ],
            ])
            ->add('dateOfBirth', null, [
                'widget' => 'single_text',
            ])
            ->add('registrationDate', null, [
                'widget' => 'single_text',
            ])
            ->add(
                'level',
                ChoiceType::class,
                [
                    'choices' => Level::casesAsArray(),  // Utilisation de Level::casesAsArray() pour les choix de niveau
                ]
            )
            
            ->addModelTransformer(new LevelTransformer())
            ->add('userRole', ChoiceType::class, [
                'choices' => UserRole::casesAsArray(), // Utilisation de UserRole::casesAsArray() pour les choix de rôle
                'expanded' => true,  // Affichage sous forme de boutons radio
                'multiple' => false, // Un seul choix possible
            ])
            
            ->addModelTransformer(new UserRoleTransformer())    

            
            // ->add('submit', SubmitType::class, ['label' => 'S\'inscrire']);
        ;

        
   
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    } }

