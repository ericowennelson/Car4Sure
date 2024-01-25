<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Holder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HolderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', null, array('attr' => array('class' => 'form-control')))
            ->add('lastName', null, array('attr' => array('class' => 'form-control')))
            ->add('address', EntityType::class, [
                'class' => Address::class,
                'choice_label' => function (Address $address) {
                    return $address->getStreet() . ' ' . $address->getCity(). ' ' . $address->getState();
                },
                'attr' => array('class' => 'form-control')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Holder::class,
        ]);
    }
}
