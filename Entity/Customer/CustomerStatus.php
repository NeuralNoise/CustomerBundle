<?php

namespace TerraMar\Bundle\CustomerBundle\Entity\Customer;

use Orkestra\Common\Type\Enum;

class CustomerStatus extends Enum
{
    const ACTIVE = 'Active';

    const INACTIVE = 'Inactive';

    const ON_HOLD = 'On-Hold';
}
