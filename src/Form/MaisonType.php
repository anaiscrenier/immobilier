<?php

namespace App\Form;

use App\Entity\Maison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class MaisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Titre', TextType::class,[
                'required' => true,
                'label' => 'Titre de l\'annonce', 
                'attr' => [
                    'placeholder' => 'ex: Jolie maison de campagne'
                ]
            ])
            ->add('Descriptif', TextType::class)
            ->add('Localisation', TextType::class)
            ->add('Prix', IntegerType::class)
            ->add('Surface', IntegerType::class)
            ->add('Pieces', IntegerType::class)
            ->add('Chambres', IntegerType::class)
            // premiere possibilité pour le jardin en dessous : // //deuxieme possibilité : CheckboxType::class)//
            ->add('Jardin', ChoiceType::class,[
                'required' => true, 
                'choices' => [
                    'oui' => true,
                    'non' => false
                ]

             ])
                
            ->add('Garage', ChoiceType::class,[
                'required' => true, 
                'choices' => [
                    'oui' => true,
                    'non' => false
                ]
            ])
            ->add('img_1')
            ->add('img_2')
            ->add('img_3')
 //['required' => false] : c'est pour enlever le champ obligatoire,(car j'ai mis false, si je veux que ca soir obligatoire il faut mettre true) et donc ca sera pas obligatooire de mettre quelque chose deand pour valider. //
            ->add('alt_1', TextType::class, ['required' => false])
            ->add('alt_2', TextType::class, ['required' => false])
            ->add('alt_3', TextType::class, ['required' => false])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Maison::class,
        ]);
    }
}
