<?php

namespace Titan\Bundle\CustomerBundle\Helper;

use Titan\Bundle\CustomerBundle\Entity\Customer;

interface EmailVerificationHelperInterface
{
    /**
     * Returns the email verification hash for a given customer
     *
     * @param \Titan\Bundle\CustomerBundle\Entity\Customer $customer
     *
     * @return string
     */
    public function getEmailVerificationHash(Customer $customer);
}
