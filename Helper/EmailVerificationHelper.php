<?php

namespace Terramar\Bundle\CustomerBundle\Helper;

use Terramar\Bundle\CustomerBundle\Model\CustomerInterface;

class EmailVerificationHelper implements EmailVerificationHelperInterface
{
    /**
     * Returns the email verification hash for a given customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Model\CustomerInterface $customer
     *
     * @return string
     */
    public function getEmailVerificationHash(CustomerInterface $customer)
    {
        return md5($customer->getId() . $customer->getEmailAddress());
    }
}
