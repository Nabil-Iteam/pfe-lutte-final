<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClubCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Club::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            FormField::addPanel('Club information'),

            AssociationField::new('governorate')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('municipality')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('season')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('typeClub')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),




            TextField::new('name')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('abreviation')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('address')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('fax')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            BooleanField::new('para')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            IntegerField::new('zipCode')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            DateField::new('fondationYear')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),

            TextField::new('autorisationCode')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('coachPhone')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('coachName')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('coachPhone')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('presidentName')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('presidentPhone')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('secretaryName')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('secretaryPhone')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('treasurerName')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('treasurerPhone')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),

            TextField::new('arabicName')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            FormField::addPanel(),
            FormField::addPanel('Contact information')
                ->setIcon('phone')->addCssClass('optional')
                ->setHelp('Phone number is preferred'),
            TextField::new('phone'),
            EmailField::new('email'),
            BooleanField::new('isValid')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),


        ];
    }

}
