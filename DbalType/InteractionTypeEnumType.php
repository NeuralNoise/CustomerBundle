<?php

namespace TerraMar\Bundle\CustomerBundle\DbalType;

use Orkestra\Common\DBAL\Types\EnumTypeBase;

/**
 * Interaction Type EnumType
 *
 * Provides integration for the Interaction Type enumeration and Doctrine DBAL
 */
class InteractionTypeEnumType extends EnumTypeBase
{
    /**
     * @var string The unique name for this EnumType
     */
    protected $_name = 'enum.terramar.customer.interaction_type';

    /**
     * @var string The fully qualified class name of the Enum that this class wraps
     */
    protected $_class = 'TerraMar\Bundle\CustomerBundle\Entity\Note\InteractionType';
}
