<?php

namespace App\Controller\Admin;

use App\Entity\Targets;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class TargetsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Targets::class;
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
            TextField::new('Name')
                ->setRequired(true),
            TextField::new('Firstname')
                ->setRequired(true),
            DateField::new('Birthday')
                ->setRequired(true),
            TextField::new('Alias')
                ->setRequired(true),
            ChoiceField::new('Country')
                ->setRequired(true) 
                ->setChoices([
                    'France' => 'France',
                    'Italy' => 'Italy',
                    'Spain' =>'Spain',
                    'Germany' => 'Germany',
                    'Belgium' =>'Belgium',
                    'Portugal' => 'Portugal',
            ]),
        ];
    }
}
