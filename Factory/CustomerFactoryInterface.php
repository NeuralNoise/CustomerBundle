<?php

namespace TerraMar\Bundle\CustomerBundle\Factory;

use TerraMar\Bundle\CustomerBundle\Entity\Customer;

interface CustomerFactoryInterface
{
    /**
     * Builds the given Customer
     *
     * @param \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer
     *
     * @return \TerraMar\Bundle\CustomerBundle\Entity\Customer
     */
    function buildCustomer(Customer $customer);
}
