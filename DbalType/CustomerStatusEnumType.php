<?php

namespace Terramar\Bundle\CustomerBundle\DbalType;

use Orkestra\Common\DbalType\AbstractEnumType;

/**
 * Customer Status EnumType
 *
 * Provides integration for the Customer Status enumeration and Doctrine DBAL
 */
class CustomerStatusEnumType extends AbstractEnumType
{
    /**
     * @var string The unique name for this EnumType
     */
    protected $name = 'enum.terramar.customer.customer_status';

    /**
     * @var string The fully qualified class name of the Enum that this class wraps
     */
    protected $class = 'Terramar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus';
}
