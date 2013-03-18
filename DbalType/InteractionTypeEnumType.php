<?php

namespace Terramar\Bundle\CustomerBundle\DbalType;

use Orkestra\Common\DbalType\AbstractEnumType;

/**
 * Interaction Type EnumType
 *
 * Provides integration for the Interaction Type enumeration and Doctrine DBAL
 */
class InteractionTypeEnumType extends AbstractEnumType
{
    /**
     * @var string The unique name for this EnumType
     */
    protected $name = 'enum.terramar.customer.interaction_type';

    /**
     * @var string The fully qualified class name of the Enum that this class wraps
     */
    protected $class = 'Terramar\Bundle\CustomerBundle\Entity\Note\InteractionType';
}
