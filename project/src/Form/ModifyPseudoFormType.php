<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ModifyPseudoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'Mon adresse email'
            ])
            ->add('pseudo', TextType::class, [
                'disabled' => true,
                'label' => 'Mon pseudo actuel',
            ])
            ->add('new_pseudo', TextType::class, [
                'label' => 'Mon nouveau pseudo  *',
                'mapped' => false,
                'constraints' => new Length([
                    'min' => 3,
                    'max' => 40
                ]),
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre nouveau pseudo '
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Mettre à jour"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
