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
            TextField::new('Name'),
            TextField::new('Firstname'),
            DateField::new('Birthday'),
            TextField::new('Alias'),
            ChoiceField::new('Country') ->setChoices([
                'Russia' =>'Russia',
                'France' => 'France',
                'Ukraine' => 'Ukraine',
                'Italy' => 'Italy',
                'Spain' =>'Spain',
                'Sweden' => 'Sweden',
                'Norway' => 'Norway',
                'Germany' => 'Germany',
                'Belgium' =>'Belgium',
                'Greece' => 'Greece',
                'Portugal' => 'Portugal',
                'Ireland' => 'Ireland',
                'Austria' => 'Austria',
                'Croatia' => 'Croatia',
                'Albania' => 'Albania',
            ]),
        ];
    }
}
