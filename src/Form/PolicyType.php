<?php

namespace App\Form;

use App\Entity\driver;
use App\Entity\holder;
use App\Entity\Policy;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PolicyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('policyNo', null, array('attr' => array('class' => 'form-control')))
            ->add('policyStatus', null, array('attr' => array('class' => 'form-control')))
            ->add('policyType', null, array('attr' => array('class' => 'form-control')))
            ->add('policyEffectiveDate', null, array('attr' => array('class' => 'form-control')))
            ->add('policyExpirationDate', null, array('attr' => array('class' => 'form-control')))
            ->add('policyHolder', EntityType::class, [
                'class' => holder::class,
                'choice_label' => function (Holder $holder) {
                    return $holder->getFirstname() . ' ' . $holder->getLastName();
                },
                'attr' => array('class' => 'form-control'),
            ])
            ->add('drivers', EntityType::class, [
                'class' => driver::class,
                'choice_label' => function (Driver $driver) {
                    return $driver->getFirstname() . ' ' . $driver->getLastName();
                },
                'multiple' => true,
                'mapped'=>true,
                'attr' => array('class' => 'form-control'),
            ])
            ->add('vehicles', EntityType::class, [
                'class' => vehicle::class,
                'choice_label' => function (Vehicle $vehicle) {
                    return $vehicle->getVin() . ' ' . $vehicle->getMake(). ' ' . $vehicle->getModel(). ' ' . $vehicle->getYear();
                },
                'multiple' => true,
                'mapped'=>true,
                'attr' => array('class' => 'form-control'),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Policy::class,
        ]);
    }
}
