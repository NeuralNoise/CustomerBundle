<?php

namespace Terramar\Bundle\CustomerBundle\Helper;

use Terramar\Bundle\CustomerBundle\Model\CustomerInterface;

interface CustomerHelperInterface
{
    /**
     * Cancels a customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Model\CustomerInterface $customer
     */
    public function deactivateCustomer(CustomerInterface $customer);

    /**
     * Activates a customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Model\CustomerInterface $customer
     */
    public function activateCustomer(CustomerInterface $customer);
}
