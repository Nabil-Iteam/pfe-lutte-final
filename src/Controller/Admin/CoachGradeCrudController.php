<?php

namespace App\Controller\Admin;

use App\Entity\CoachGrade;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CoachGradeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CoachGrade::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Grade Arbitre')
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
