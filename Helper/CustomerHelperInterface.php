<?php

namespace TerraMar\Bundle\CustomerBundle\Helper;

use TerraMar\Bundle\CustomerBundle\Entity\Customer;

interface CustomerHelperInterface
{
    /**
     * Cancels a customer
     *
     * @param \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function deactivateCustomer(Customer $customer);

    /**
     * Activates a customer
     *
     * @param \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer
     */
    public function activateCustomer(Customer $customer);
}
