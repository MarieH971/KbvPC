<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',  // Label personnalisé pour le champ "Nom"
                'attr' => [
                    'placeholder' => 'Entrez votre prénom',  // Ajout d'un placeholder
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',  // Label personnalisé pour le champ "Nom"
                'attr' => [
                    'placeholder' => 'Entrez votre nom',  // Ajout d'un placeholder
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Entrez votre phone',  // Ajout d'un placeholder
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',  // Label personnalisé pour le champ "Email"
                'attr' => [
                    'placeholder' => 'Entrez votre adresse e-mail',  // Ajout d'un placeholder
                ],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet',  // Label personnalisé pour le champ "Email"
                'attr' => [
                    'placeholder' => 'Entrez votre sujet',  // Ajout d'un placeholder
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',  // Label personnalisé pour le champ "Message"
                'attr' => [
                    'placeholder' => 'Votre message',  // Ajout d'un placeholder
                    'rows' => 5,  // Taille du textarea
                ],
            ]);

        }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
