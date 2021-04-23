<?php

namespace App\Controller\Admin;

use App\Entity\Safeplaces;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class SafeplacesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Safeplaces::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('Id_code')
                ->setRequired(true),
            TextareaField::new('Address')
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
            ChoiceField::new('Type')
                ->setRequired(true) 
                ->setChoices([
                    'Appartment' =>'Appartment',
                    'City house' => 'City house',
                    'Country house' => 'Country house',
                    'Hotel' => 'Hotel'
            ]),
        ];
    }
}
