<?php

namespace Titan\Bundle\CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('emailAddress')
            ->add('subscribed')
            ->add('active')
            ->add('dateModified')
            ->add('dateCreated')
            ->add('contactAddress')
            ->add('billingAddress')
            ->add('notes')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Titan\Bundle\CustomerBundle\Entity\Customer'
        ));
    }

    public function getName()
    {
        return 'customer';
    }
}
