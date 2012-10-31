<?php

namespace Titan\Bundle\CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AdvancedSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', 'text', array('label' => 'First Name', 'required' => false))
            ->add('lastName', 'text', array('label' => 'Last Name', 'required' => false))
            ->add('phone', 'tel', array('label' => 'Phone', 'required' => false))
            ->add('emailAddress', 'text', array('label' => 'Email', 'required' => false))
            ->add('streetAddress', 'text', array('label' => 'Street Address', 'required' => false))
            ->add('city', 'text', array('label' => 'City', 'required' => false))
            ->add('state', 'entity', array(
                'label' => 'State',
                'required' => false,
                'class' => 'Orkestra\Bundle\ApplicationBundle\Entity\Contact\Region',
                'query_builder' => function (EntityRepository $er) {
                    $qb = $er->createQueryBuilder('r')
                        ->join('r.country', 'c', 'WITH', 'c.code = :code');
                    $qb->setParameter(':code', 'US');

                    return $qb;
                }
            ))
            ->add('zip', 'text', array('label' => 'Zip', 'required' => false))
            ->add('customerStatus', 'enum', array(
                'label' => 'Customer Status',
                'required' => false,
                'enum' => 'Titan\Bundle\CustomerBundle\Entity\Customer\CustomerStatus'
            ))
            ->add('lastModified', 'entity', array(
                'label' => 'Last Person to Modify',
                'required' => false,
                'class' => 'Orkestra\Bundle\ApplicationBundle\Entity\User',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.active = true');
                },
            ));
    }

    public function getName()
    {
        return 'advanced_search';
    }
}
