<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('birthDay')
            ->add('gender')
            ->add('email')
            ->add('phone')
            ->add('address')
            ->add('cin')
            ->add('numActBirth')
            ->add('arabicName')
            ->add('beltGrade')
            ->add('coachGrade')
            ->add('dirigeantType')
            ->add('refreeGrade')
            ->add('season')
            ->add('athletCategory')
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
}
