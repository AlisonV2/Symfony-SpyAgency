<?php

namespace App\Form;

use App\Entity\Agents;
use App\Entity\Targets;
use App\Entity\Contacts;
use App\Entity\Missions;
use App\Entity\Safeplaces;
use Symfony\Component\Form\FormEvent;
use App\Repository\ContactsRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'label' => 'Title'
            ])
            ->add('description', TextareaType::class, [
                'required' => true,
                'label' => 'Description'
            ])
            ->add('status', ChoiceType::class, [
                'required' => true,
                'label' => 'Status',
                'placeholder' => 'Please select a status',
                'choices' => [
                    'Planning' =>'Planning',
                    'In progress' => 'In progress',
                    'Completed' => 'Completed',
                    'Failed' => 'Failed'
                ],
            ])
            ->add('startDate', DateTimeType::class, [
                'required' => true
            ])
            ->add('endDate', DateTimeType::class, [
                'required' => true
            ])
            ->add('country', ChoiceType::class, [
                'label' => 'Country',
                'required' => true,
                'placeholder' => 'Please select a country',
                'choices' => [
                    'Russia',
                    'France',         
                    'Ukraine',
                    'Italy',
                    'Spain',
                    'Sweden',
                    'Norway',
                    'Germany',
                    'Belgium',
                    'Greece',
                    'Portugal',
                    'Ireland',
                    'Austria',
                    'Croatia',
                    'Albania',
                ],
            ])
            ->add('speciality');

            $builder->addEventListener(

                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) {

                    $form = $event->getForm();
                    $data = $event->getData();

                    $country = $data->getCountry();

                    $form
                        ->add('contacts', EntityType::class, [
                            'class' => Contacts::class,
                            'choice_label' => 'alias',
                        ])
                        ->add('submit', SubmitType::class);
            
            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Missions::class,
        ]);
    }
}
