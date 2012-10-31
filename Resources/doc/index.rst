========
Overview
========

This bundle adds customer management functionality to an application.



Installation
------------

1. Install via composer



Configuration
-------------

1. Add bundles routes in routing.yml

    TitanCustomerBundle:
      resource: "@TitanCustomerBundle/Resources/config/routing.yml"


2. Ensure that `orkestra.system_email_address` has a value in parameters.yml. An array can be used, see Swift_Message::setFrom

    parameters:
      orkestra.system_email_address:    { system@titanwebdev.com: 'System Generated' }

3. Register the DBAL types in config.yml

    doctrine:
      dbal:
        types:
          enum.titan.customer.interaction_type: Titan\Bundle\CustomerBundle\DbalType\InteractionTypeEnumType
          enum.titan.customer.customer_status:  Titan\Bundle\CustomerBundle\DbalType\CustomerStatusEnumType

4. Ensure the proper roles are in the hierarchy in security.yml. See ROLES REFERENCE below.


Roles Reference
---------------

*ROLE_CUSTOMER_READ*    - Read permission on Customer and Search controllers
*ROLE_CUSTOMER_WRITE*   - Write permission on Customer and Search controllers
