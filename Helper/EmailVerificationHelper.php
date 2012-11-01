<?php

namespace TerraMar\Bundle\CustomerBundle\Helper;

use TerraMar\Bundle\CustomerBundle\Entity\Customer;

class EmailVerificationHelper implements EmailVerificationHelperInterface
{
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
