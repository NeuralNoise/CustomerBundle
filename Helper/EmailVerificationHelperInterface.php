<?php

namespace TerraMar\Bundle\CustomerBundle\Helper;

use TerraMar\Bundle\CustomerBundle\Entity\Customer;

interface EmailVerificationHelperInterface
{
    /**
     * Returns the email verification hash for a given customer
     *
     * @param \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer
     *
     * @return string
     */
    public function getEmailVerificationHash(Customer $customer);
}
