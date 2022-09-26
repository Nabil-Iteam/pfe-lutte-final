<?php

namespace App\Form;

use App\Entity\Club;
use Symfony\Component\Form\AbstractType;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
=======
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
>>>>>>> d52008ea3b4817606005e07e0b14b6d9966dc876

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('arabicName')
            ->add('abreviation')
            ->add('address')
<<<<<<< HEAD
            ->add('phone',TextType::class)
            ->add('fax',TextType::class)
            ->add('zipCode')
            ->add('autorisationCode')
            ->add('fondationYear',TextType::class)
            ->add('coachName')
            ->add('coachPhone',TextType::class)
            ->add('presidentName')
            ->add('presidentPhone')
            ->add('secretaryName')
            ->add('treasurerPhone',TextType::class)
            ->add('secretaryPhone',TextType::class)
            ->add('treasurerName')
            ->add('email')
            ->add('municipality')
            ->add('governorate')
            ->add('typeClub')
            ->add('image',FileType::class)
=======
            ->add('phone')
            ->add('fax')
            ->add('para')
            ->add('zipCode')
            ->add('autorisationCode')
            ->add('fondationYear')
            ->add('coachName')
            ->add('coachPhone')
            ->add('presidentName')
            ->add('presidentPhone')
            ->add('secretaryName')
            ->add('treasurerPhone')
            ->add('secretaryPhone')
            ->add('treasurerName')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('email')
            ->add('municipality')
            ->add('season')
            ->add('members')
            ->add('governorate')
            ->add('typeClub')
>>>>>>> d52008ea3b4817606005e07e0b14b6d9966dc876
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
