<?php

namespace App\Form;

use App\Entity\Agents;
use App\Entity\Contacts;
use App\Entity\Missions;
use App\Entity\Safeplaces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('country', ChoiceType::class, [
                'choices' => [
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
                ]
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Planning' =>'Planning',
                    'In progress' => 'In progress',
                    'Completed' => 'Completed',
                    'Failed' => 'Failed'
                ]
            ])
            ->add('startDate', DateType::class, [
                'widget' => 'choice',
                'format' => 'd/M/y'
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'choice',
                'format' => 'd/M/y'
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Kill' => 'Kill', 
                    'Spy'=> 'Spy', 
                    'Information' => 'Information', 
                    'Extraction' => 'Extraction', 
                    'Torture' => 'Torture',
                    'Blackmail' => 'Blackmail'
                ]
            ])
            ->add('agents', EntityType::class, [
                'class' => Agents::class,
                'multiple' => true,
                'choice_label' => 'idCode',
            ])
            ->add('contacts', EntityType::class, [
                'class' => Contacts::class,
                'multiple' => true,
                'choice_label' => 'alias',
            ])
            ->add('targets', EntityType::class, [
                'class' => Targets::class,
                'multiple' => true,
                'choice_label' => 'alias',
            ])
            ->add('agents', EntityType::class, [
                'class' => Safeplaces::class,
                'multiple' => true,
                'choice_label' => 'idCode',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Missions::class,
        ]);
    }
}
