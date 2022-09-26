<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\FileType;
=======
>>>>>>> d52008ea3b4817606005e07e0b14b6d9966dc876
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
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
=======
            ->add('image',null,[
                'label'=>'Photo'
            ])
            ->add('firstName', null, [
                'label'=>'Prénom'
            ])
            ->add('lastName', null, [
                'label'=>'Nom'
            ])
            ->add('birthDay', null, [
        'label'=>'date de naissance'
    ])
            ->add('gender', null, [
                'label'=>'Genre'
            ])
            ->add('email')
            ->add('phone', null, [
                'label'=>'téléphone'
            ])
            ->add('address', null, [
                'label'=>'Adresse'
            ])
            ->add('cin')
            ->add('numActBirth', null, [
                'label'=>'Act de Naissance'
            ])
            ->add('arabicName', null, [
                'label'=>'Nom en arabe'
            ])
            ->add('createdAt')
            ->add('updatedAt')
            ->add('club')
            ->add('beltGrade', null, [
                'label'=>'Grade technique'
            ])
            ->add('coachGrade', null, [
                'label'=>'Grade d\'entraineur'
            ])
            ->add('dirigeantType', null, [
                'label'=>'Type de Dirigeant'
            ])
            ->add('municipality', null, [
                'label'=>'Municipalité'
            ])
            ->add('refreeGrade', null, [
                'label'=>'Grade d\'arbitre'
            ])
            ->add('season', null, [
                'label'=>'saison'
            ])
            ->add('athletCategory', null, [
                'label'=>'Catégorie d\'athlète'
>>>>>>> d52008ea3b4817606005e07e0b14b6d9966dc876
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
