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

    TerramarCustomerBundle:
      resource: "@TerramarCustomerBundle/Resources/config/routing.yml"


2. Ensure that `orkestra.system_email_address` has a value in parameters.yml. An array can be used, see Swift_Message::setFrom

    parameters:
      orkestra.system_email_address:    { system@terramarwebdev.com: 'System Generated' }

3. Ensure the proper roles are in the hierarchy in security.yml. See ROLES REFERENCE below.


Email Verification
------------------

You can disable email verification by specifying the following in your config.yml

    terramar_customer:
      enable_email_verification: false

For an unauthenticated user to verify their email, you must add the correct exclude to your firewall in security.yml

    firewalls:
      unsecured:
        pattern:  ^/verify-email/
        security: false

Email will be sent using the configured value in the parameter `orkestra.system_email_address`.


Roles Reference
---------------

*ROLE_CUSTOMER_READ*    - Read permission on Customer and Search controllers
*ROLE_CUSTOMER_WRITE*   - Write permission on Customer and Search controllers
