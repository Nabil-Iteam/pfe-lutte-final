<?php

namespace App\Controller\Admin;

use App\Entity\TypeClub;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Csrud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeClubCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeClub::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Type de club')
            ->setEntityLabelInPlural('Types des clubs');
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
