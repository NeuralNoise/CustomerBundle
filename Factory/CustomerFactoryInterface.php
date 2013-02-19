<?php

namespace Terramar\Bundle\CustomerBundle\Factory;

use Terramar\Bundle\CustomerBundle\Entity\Customer;

interface CustomerFactoryInterface
{
    /**
     * Builds the given Customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer $customer
     *
     * @return \Terramar\Bundle\CustomerBundle\Entity\Customer
     */
    function buildCustomer(Customer $customer);
}
