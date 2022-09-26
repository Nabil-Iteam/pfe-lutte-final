<?php

namespace App\Controller\Admin;

use App\Entity\DirigeantType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DirigeantTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DirigeantType::class;
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
