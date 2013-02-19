<?php

namespace Terramar\Bundle\CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Orkestra\Bundle\ApplicationBundle\Form\Contact\AddressType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', null, array('label' => 'First Name'))
            ->add('lastName', null, array('label' => 'Last Name'))
            ->add('emailAddress', 'email', array('label' => 'Email Address'))
            ->add('subscribed', null, array('required' => false))
            ->add('contactAddress', new AddressType());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Terramar\Bundle\CustomerBundle\Entity\Customer'
        ));
    }

    public function getName()
    {
        return 'customer';
    }
}
