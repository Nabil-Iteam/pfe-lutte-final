<?php

namespace App\Controller\Admin;

use App\Entity\Municipality;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MunicipalityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Municipality::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('governorate')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),

            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('arabicName'),

        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Municipalité')
            ->setEntityLabelInPlural('Municipalités');
    }

}
