<?php

namespace App\Form;

use App\Entity\address;
use App\Entity\Policy;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('year', null, array('attr' => array('class' => 'form-control')))
            ->add('make', null, array('attr' => array('class' => 'form-control')))
            ->add('model', null, array('attr' => array('class' => 'form-control')))
            ->add('vin', null, array('attr' => array('class' => 'form-control')))
            ->add('vehicleUsage', null, array('attr' => array('class' => 'form-control')))
            ->add('primaryUse', null, array('attr' => array('class' => 'form-control')))
            ->add('annualMileage', null, array('attr' => array('class' => 'form-control')))
            ->add('ownership', null, array('attr' => array('class' => 'form-control')))
            ->add('garagingAddress', EntityType::class, [
                'class' => address::class,
                'choice_label' => function (Address $address) {
                    return $address->getStreet() . ' ' . $address->getCity(). ' ' . $address->getState();
                },
                'attr' => array('class' => 'form-control')
            ])
            ->add('policy', EntityType::class, [
                'class' => Policy::class,
                'choice_label' => function (Policy $policy) {
                    return $policy->getPolicyNo();
                },
                'attr' => array('class' => 'form-control')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
