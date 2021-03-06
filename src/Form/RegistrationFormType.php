<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Rollerworks\Component\PasswordStrength\Validator\Constraints\PasswordStrength;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class,[
            'attr' => [
                'placeholder' => 'email.email@email.exemple']
                ])

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos termes et conditions.',
                    ]),
                ],
                'label' => 'Accepter les termes et conditions'
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un mot de passe',
                    ]),

                    //code par defaut avec 6 caracteres de base, je le laisse en commentaire, 
                    // pour voir comment un exemple par defaut. 
                            //new Length([
                           //'min' => 6,
                          //'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                         // max length allowed by Symfony for security reasons
                        // 'max' => 4096,
                       // ]),

                new passwordStrength([
                    'minLength' => 8,     //longeur minimal
                    'tooShortMessage' => 'le mot de passe doit contenir au moins 8 caractères',//Message si ont rempli pas 8 caracères. 
                    'minStrength' => 4,  //Force de mot de passe
                    'message' => 'le mot de passe doit contenir au moins une lettre minuscule,une lettre majuscule et un chiffre'

              ])
              ],
            

                'attr' => [
                    'placeholder' => 'Mot de passe'
                ], 
                'label' => 'Mot de passe'
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
