<?php

namespace TerraMar\Bundle\CustomerBundle\DbalType;

use Orkestra\Common\DBAL\Types\EnumTypeBase;

/**
 * Customer Status EnumType
 *
 * Provides integration for the Customer Status enumeration and Doctrine DBAL
 */
class CustomerStatusEnumType extends EnumTypeBase
{
    /**
     * @var string The unique name for this EnumType
     */
    protected $_name = 'enum.terramar.customer.customer_status';

    /**
     * @var string The fully qualified class name of the Enum that this class wraps
     */
    protected $_class = 'TerraMar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus';
}
