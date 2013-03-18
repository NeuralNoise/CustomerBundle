<?php

namespace Terramar\Bundle\CustomerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Doctrine\DBAL\Types\Type;

class TerramarCustomerBundle extends Bundle
{
    public function boot()
    {
        Type::addType('enum.terramar.customer.interaction_type', 'Terramar\Bundle\CustomerBundle\DbalType\InteractionTypeEnumType');
        Type::addType('enum.terramar.customer.customer_status',  'Terramar\Bundle\CustomerBundle\DbalType\CustomerStatusEnumType');
    }
}
