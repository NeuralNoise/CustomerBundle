<?php

namespace Terramar\Bundle\CustomerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Doctrine\DBAL\Types\Type;

class TerramarCustomerBundle extends Bundle
{
    public function boot()
    {
        $this->registerTypeIfNotRegistered('enum.terramar.customer.interaction_type', 'Terramar\Bundle\CustomerBundle\DbalType\InteractionTypeEnumType');
        $this->registerTypeIfNotRegistered('enum.terramar.customer.customer_status',  'Terramar\Bundle\CustomerBundle\DbalType\CustomerStatusEnumType');
    }

    /**
     * Registers a type with Doctrine DBAL if it is not already registered.
     *
     * This is necessary because multiple instantiations of this bundle will
     * cause an error to be thrown by the DBAL.
     *
     * @param string $typeName
     * @param string $className
     */
    private function registerTypeIfNotRegistered($typeName, $className)
    {
        if (!(Type::hasType($typeName))) {
            Type::addType($typeName, $className);
        }
    }
}
