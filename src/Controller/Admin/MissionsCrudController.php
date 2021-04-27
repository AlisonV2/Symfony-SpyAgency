<?php

namespace App\Controller\Admin;

use App\Entity\Agents;
use App\Entity\Targets;
use App\Entity\Contacts;
use App\Entity\Missions;
use App\Entity\Safeplaces;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class MissionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Missions::class;
        return Missions::class;
        return Contacts::class;
        return Agents::class;
        return Targets::class;
        return Safeplaces::class;
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
            TextField::new('Title')
                ->setRequired(true),
            TextAreaField::new('Description')
                ->setRequired(true),
            TextField::new('Alias')
                ->setRequired(true),
            ChoiceField::new('Country') 
                ->setChoices([
                    'France' => 'France',
                    'Italy' => 'Italy',
                    'Spain' =>'Spain',
                    'Germany' => 'Germany',
                    'Belgium' =>'Belgium',
                    'Portugal' => 'Portugal',
            ]) 
                ->setRequired(true),

            ChoiceField::new('Status') 
                ->setChoices([
                    'Planning' =>'Planning',
                    'In progress' => 'In progress',
                    'Completed' => 'Completed',
                    'Failed' => 'Failed'
            ])
                ->setRequired(true),
            ChoiceField::new('Speciality') 
                ->setChoices([
                    'Information' => 'Information', 
                    'Extraction' => 'Extraction', 
                    'Torture' => 'Torture',
                    'Blackmail' => 'Blackmail'
            ])
                ->setRequired(true),
            DateField::new('startDate', 'Start date')
                ->setRequired(true),
            DateField::new('endDate', 'End date')
                ->setRequired(true),
            AssociationField::new('agents', 'Agents')
                ->setRequired(true)
                ->setHelp('Please select an agent with the same speciality and from a different country than the mission\'s.'),
            AssociationField::new('contacts', 'Contacts')
                ->setRequired(true)
                ->setHelp('Please select a contact from the same country as the mission\'s.'),
            AssociationField::new('targets', 'Targets')
                ->setRequired(true)
                ->setHelp('Please select a target from the same country as the mission\'s.'),
            AssociationField::new('safeplaces', 'Safeplaces')
                ->setHelp('Please select a safeplace from the same country as the mission\'s.')
        ];
    }
}
