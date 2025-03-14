<?php

    namespace App\Form;

    use App\Entity\User;

    use App\Enum\Level;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\Extension\Core\Type\FileType;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Component\Validator\Constraints\Image;


    class UserType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('firstName')
                ->add('lastName')
                ->add('photo', FileType::class, [
                    'mapped'   => false,
                    'required' => false,
                    'attr' => [
                        'accept' => 'image/jpeg, image/png, image/jpg',
                    ],
                    'constraints' => [
            new Image([
                'maxSize' => '2M',  
                'mimeTypesMessage' => 'Veuillez télécharger une image au format JPEG, JPG ou PNG.',
            ]),
        ],
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
                ->add('level', ChoiceType::class, [
                    'label'        => 'Niveau',
                    'choices'      => array_combine(
                        array_map(fn($level) => $level->value, Level::cases()),
                        Level::cases()
                    ),
                    'choice_label' => fn(Level $level) => $level->value,
                    'placeholder'  => 'Choisissez le niveau',
                ]);

        }

        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => User::class,
            ]);
        }
    }

