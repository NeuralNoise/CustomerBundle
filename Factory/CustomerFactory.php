<?php

namespace TerraMar\Bundle\CustomerBundle\Factory;

use TerraMar\Bundle\CustomerBundle\Entity\Customer;

class CustomerFactory implements CustomerFactoryInterface
{
    /**
     * Builds the given Customer entity
     *
     * @param \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer
     *
     * @return \TerraMar\Bundle\CustomerBundle\Entity\Customer
     */
    public function buildCustomer(Customer $customer)
    {
        return $customer;
    }
}
