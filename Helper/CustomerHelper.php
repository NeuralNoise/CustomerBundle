<?php

namespace TerraMar\Bundle\CustomerBundle\Helper;

use TerraMar\Bundle\CustomerBundle\Entity\Customer;
use TerraMar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus;

class CustomerHelper implements CustomerHelperInterface
{
    /**
     * Cancels a customer
     *
     * @param \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function deactivateCustomer(Customer $customer)
    {
        $customer->setStatus(new CustomerStatus(CustomerStatus::INACTIVE));
    }

    /**
     * Activates a customer
     *
     * @param \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function activateCustomer(Customer $customer)
    {
        $customer->setStatus(new CustomerStatus(CustomerStatus::ACTIVE));
    }

    /**
     * Returns the email verification hash for a given customer
     *
     * @param \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer
     *
     * @return string
     */
    public function getEmailVerificationHash(Customer $customer)
    {
        return md5($customer->getId() . $customer->getEmailAddress());
    }
}
