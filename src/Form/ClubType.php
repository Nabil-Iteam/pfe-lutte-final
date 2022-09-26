<?php

namespace App\Form;

use App\Entity\Club;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('arabicName')
            ->add('abreviation')
            ->add('address')
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
