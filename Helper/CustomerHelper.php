<?php

namespace Terramar\Bundle\CustomerBundle\Helper;

use Terramar\Bundle\CustomerBundle\Model\CustomerInterface;
use Terramar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus;

class CustomerHelper implements CustomerHelperInterface
{
    /**
     * Cancels a customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Model\CustomerInterface $customer
     */
    public function deactivateCustomer(CustomerInterface $customer)
    {
        $customer->setStatus(new CustomerStatus(CustomerStatus::INACTIVE));
    }

    /**
     * Activates a customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Model\CustomerInterface $customer
     */
    public function activateCustomer(CustomerInterface $customer)
    {
        $customer->setStatus(new CustomerStatus(CustomerStatus::ACTIVE));
    }
}
