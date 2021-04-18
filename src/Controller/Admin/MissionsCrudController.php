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
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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

        $contactsAlias = $this->getDoctrine()->getRepository(Contacts::class)->findAll();
        $targetsAlias = $this->getDoctrine()->getRepository(Targets::class)->findAll();
        $agentsIdCode = $this->getDoctrine()->getRepository(Agents::class)->getIdCode();
        $safeplacesIdCode = $this->getDoctrine()->getRepository(Safeplaces::class)->findAll();

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
            ChoiceField::new('Contacts', 'Contact')->setChoices($contactsAlias),
            ChoiceField::new('Targets', 'Target')->setChoices($targetsAlias),
            ChoiceField::new('Agents', 'Agent')->setChoices($agentsIdCode),
            ChoiceField::new('Safeplaces', 'Safeplace')->setChoices($safeplacesIdCode),
        ];
    }
}
