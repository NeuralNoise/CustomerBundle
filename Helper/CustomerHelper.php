<?php

namespace Terramar\Bundle\CustomerBundle\Helper;

use Terramar\Bundle\CustomerBundle\Entity\Customer;
use Terramar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus;

class CustomerHelper implements CustomerHelperInterface
{
    /**
     * Cancels a customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function deactivateCustomer(Customer $customer)
    {
        $customer->setStatus(new CustomerStatus(CustomerStatus::INACTIVE));
    }

    /**
     * Activates a customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function activateCustomer(Customer $customer)
    {
        $customer->setStatus(new CustomerStatus(CustomerStatus::ACTIVE));
    }
}
