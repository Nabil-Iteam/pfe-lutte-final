<?php

namespace App\Controller\Admin;

use App\Entity\Governorate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GovernorateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Governorate::class;
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
