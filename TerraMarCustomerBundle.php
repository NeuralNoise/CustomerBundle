<?php

namespace TerraMar\Bundle\CustomerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Doctrine\DBAL\Types\Type;

class TerraMarCustomerBundle extends Bundle
{
    public function boot()
    {
        Type::addType('enum.terramar.customer.interaction_type', 'TerraMar\Bundle\CustomerBundle\DbalType\InteractionTypeEnumType');
        Type::addType('enum.terramar.customer.customer_status',  'TerraMar\Bundle\CustomerBundle\DbalType\CustomerStatusEnumType');
    }
}
