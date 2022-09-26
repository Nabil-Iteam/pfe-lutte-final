<?php

namespace App\Controller\Admin;

use App\Entity\Member;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MemberCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Member::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex()
                ->setFormTypeOption('allow_delete',false),
            ImageField::new('image')->setBasePath('/uploads/images/products/')->onlyOnIndex(),
            AssociationField::new('municipality')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('season')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('club')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('beltGrade')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('coachGrade')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('dirigeantType')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('refreeGrade')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            AssociationField::new('athletCategory')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),


            TextField::new('firstName')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('arabicName')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('lastName')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            dateField::new('birthDay')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('gender')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            TextField::new('address')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            IntegerField::new('cin')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),
            IntegerField::new('numActBirth')->setColumns('col-sm-12 col-md-4 col-lg-6 col-xxl-3'),


            FormField::addPanel(),
            FormField::addPanel('Contact information')
                ->setIcon('phone')->addCssClass('optional')
                ->setHelp('Phone number is preferred'),
            IntegerField::new('phone'),
            EmailField::new('email'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Membre')
            ->setEntityLabelInPlural('Membres');
    }
}
