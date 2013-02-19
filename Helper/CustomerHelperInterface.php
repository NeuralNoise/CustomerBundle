<?php

namespace Terramar\Bundle\CustomerBundle\Helper;

use Terramar\Bundle\CustomerBundle\Entity\Customer;

interface CustomerHelperInterface
{
    /**
     * Cancels a customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function deactivateCustomer(Customer $customer);

    /**
     * Activates a customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function activateCustomer(Customer $customer);
}
