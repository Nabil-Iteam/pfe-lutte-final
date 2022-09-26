<?php

namespace App\Controller\Admin;

use App\Entity\AthletCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AthletCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AthletCategory::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular(' Catégorie d\'athlète')
            ->setEntityLabelInPlural('Categories des Athlètes');
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
