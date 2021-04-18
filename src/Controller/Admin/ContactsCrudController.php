<?php

namespace App\Controller\Admin;

use App\Entity\Contacts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contacts::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDateFormat('dd/MM/yyyy')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Name'),
            TextField::new('Firstname'),
            DateField::new('Birthday'),
            TextField::new('Alias'),
            ChoiceField::new('Country') ->setChoices([
                'France' => 'France',
                'Belgium' => 'Belgium',
                'Spain' => 'Spain',
                'Italy' => 'Italy'
            ]), 
        ];
    }
}
