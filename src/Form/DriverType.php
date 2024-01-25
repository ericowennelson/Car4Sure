<?php

namespace App\Form;

use App\Entity\Driver;
use App\Entity\Policy;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DriverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', null, array('attr' => array('class' => 'form-control')))
            ->add('lastName', null, array('attr' => array('class' => 'form-control')))
            ->add('age', null, array('attr' => array('class' => 'form-control')))
            ->add('gender', null, array('attr' => array('class' => 'form-control')))
            ->add('maritalStatus', null, array('attr' => array('class' => 'form-control')))
            ->add('licenseNumber', null, array('attr' => array('class' => 'form-control')))
            ->add('licenseState', null, array('attr' => array('class' => 'form-control')))
            ->add('licenseStatus', null, array('attr' => array('class' => 'form-control')))
            ->add('licenseEffectiveDate', null, array('attr' => array('class' => 'form-control')))
            ->add('licenseExpirationDate', null, array('attr' => array('class' => 'form-control')))
            ->add('licenseClass', null, array('attr' => array('class' => 'form-control')))
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
            'data_class' => Driver::class,
        ]);
    }
}
