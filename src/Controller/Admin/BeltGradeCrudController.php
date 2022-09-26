<?php

namespace App\Controller\Admin;

use App\Entity\BeltGrade;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class BeltGradeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BeltGrade::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Grade Technique')
            ->setEntityLabelInPlural('Grades Techniques');
    }

  /*  public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }*/
}
