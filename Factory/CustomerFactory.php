<?php

namespace Terramar\Bundle\CustomerBundle\Factory;

use Terramar\Bundle\CustomerBundle\Entity\Customer;

class CustomerFactory implements CustomerFactoryInterface
{
    /**
     * Builds the given Customer entity
     *
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer $customer
     *
     * @return \Terramar\Bundle\CustomerBundle\Entity\Customer
     */
    public function buildCustomer(Customer $customer)
    {
        return $customer;
    }
}
