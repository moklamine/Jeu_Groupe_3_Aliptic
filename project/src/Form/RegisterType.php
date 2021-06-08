<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Votre pseudo *',
                'constraints' => new Length([
                    'min' => 3,
                    'max' => 40
                ]),
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre pseudo'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email *',
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre email'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => "Le mot de passe et sa confirmation doivent correspondre",
                'required' => true,
                'first_options' => [
                    'label' => 'Votre mot de passe *',
                    'constraints' => [
                        new Length([
                            'min' => 8,
                            'minMessage' => 'Votre mot de passe doit avoir au moins {{ limit }} caractères',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                    'attr' => [
                        'placeholder' => 'Veuillez saisir votre mot de passe.'
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmez votre mot de passe*',
                    'attr' => [
                        'placeholder' => 'Veuillez confirmer votre mot de passe.'
                    ]
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire",
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => "Vous devez acccepter les conditions",
                    ]),
                ],
            ]
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
