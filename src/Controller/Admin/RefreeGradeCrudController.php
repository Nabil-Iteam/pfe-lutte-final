<?php

namespace App\Controller\Admin;

use App\Entity\RefreeGrade;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RefreeGradeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RefreeGrade::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Grade d\'arbitre')
            ->setEntityLabelInPlural('Grades des arbitres');
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
