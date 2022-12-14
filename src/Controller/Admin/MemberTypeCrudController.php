<?php

namespace App\Controller\Admin;

use App\Entity\MemberType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MemberTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MemberType::class;
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
