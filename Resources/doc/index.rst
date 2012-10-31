========
Overview
========

This bundle adds customer management functionality to an application.



Installation
------------

1. Install via composer



Configuration
-------------

1. Ensure that `orkestra.system_email_address` has a value in parameters.yml. An array can be used, see Swift_Message::setFrom

    parameters:
      orkestra.system_email_address:    { system@titanwebdev.com: 'System Generated' }

2. Register the DBAL types in config.yml

    doctrine:
      dbal:
        types:
          enum.titan.customer.interaction_type: Titan\Bundle\CustomerBundle\DbalType\InteractionTypeEnumType
          enum.titan.customer.customer_status:  Titan\Bundle\CustomerBundle\DbalType\CustomerStatusEnumType
