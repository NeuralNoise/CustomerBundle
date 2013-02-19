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

    /**
     * Returns the email verification hash for a given customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer $customer
     *
     * @return string
     */
    public function getEmailVerificationHash(Customer $customer)
    {
        return md5($customer->getId() . $customer->getEmailAddress());
    }
}
