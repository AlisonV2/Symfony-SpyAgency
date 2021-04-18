<?php

namespace App\Controller\Admin;

use App\Entity\Missions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class MissionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Missions::class;
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
            TextField::new('Title'),
            TextAreaField::new('Description'),
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

            ChoiceField::new('Status') ->setChoices([
                'Planning' =>'Planning',
                'In progress' => 'In progress',
                'Completed' => 'Completed',
                'Failed' => 'Failed'
            ]),
            ChoiceField::new('Speciality') ->setChoices([
                'Kill' => 'Kill', 
                'Spy'=> 'Spy', 
                'Information' => 'Information', 
                'Extraction' => 'Extraction', 
                'Torture' => 'Torture',
                'Blackmail' => 'Blackmail'

            ]),
            DateField::new('startDate', 'Start date'),
            DateField::new('endDate', 'End date'),
            TextField::new('Contacts', 'Contact'),
            TextField::new('Targets', 'Target'),
            TextField::new('Agents', 'Agent'),
            TextField::new('Safeplaces', 'Safeplace')
        ];
    }
}
