<?php

namespace Terramar\Bundle\CustomerBundle\Helper;

use Terramar\Bundle\CustomerBundle\Model\CustomerInterface;

interface EmailVerificationHelperInterface
{
    /**
     * Returns the email verification hash for a given customer
     *
     * @param \Terramar\Bundle\CustomerBundle\Model\CustomerInterface $customer
     *
     * @return string
     */
    public function getEmailVerificationHash(CustomerInterface $customer);
}
