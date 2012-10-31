<?php

namespace Titan\Bundle\CustomerBundle\Helper;

use Titan\Bundle\CustomerBundle\Entity\Customer;

interface CustomerHelperInterface
{
    /**
     * Cancels a customer
     *
     * @param \Titan\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function deactivateCustomer(Customer $customer);

    /**
     * Activates a customer
     *
     * @param \Titan\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function activateCustomer(Customer $customer);
}
