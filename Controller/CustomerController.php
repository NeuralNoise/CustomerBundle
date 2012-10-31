<?php

namespace Titan\Bundle\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Orkestra\Bundle\ApplicationBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Titan\Bundle\CustomerBundle\Entity\Customer;

/**
 * Customer controller.
 *
 * @Route("/customer")
 */
class CustomerController extends Controller
{
    /**
     * Lists all Customer entities.
     *
     * @Route("s/", name="customers")
     * @Template()
     * @Secure(roles="ROLE_CUSTOMER_READ")
     */
    public function indexAction(Request $request)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TitanCustomerBundle:Customer')->findBy(array('active' => true), null, 50);

        $this->get('titan.customer.helper.search_results')->setLastSearchResults(SearchController::LAST_SEARCH_KEY, $entities);

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Lists all recently added Customer entities.
     *
     * @Route("s/recent", name="customers_recent")
     * @Template("TitanCustomerBundle:Customer:index.html.twig")
     * @Secure(roles="ROLE_CUSTOMER_READ")
     */
    public function recentAction()
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $entities = $em->createQueryBuilder()
            ->select('c')
            ->from('TitanCustomerBundle:Customer', 'c')
            ->where('c.active = true')
            ->orderBy('c.dateCreated', 'DESC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();

        $this->get('titan.customer.helper.search_results')->setLastSearchResults(SearchController::LAST_SEARCH_KEY, $entities);

        return array(
            'entities' => $entities,
        );
    }

    /**
     * De-Activate a Customer.
     *
     * @Route("/{id}/deactivate", name="customer_deactivate", defaults={"_format"="json"})
     * @Secure(roles="ROLE_CUSTOMER_READ")
     */
    public function deactivateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $customer = $em->getRepository('TitanCustomerBundle:Customer')->find($id);

        if (!$customer) {
            throw $this->createNotFoundException('Unable to find Customer entity.');
        }

        $helper = $this->get('titan.customer.helper.customer');
        $helper->deactivateCustomer($customer);
        $em->persist($customer);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Customer deactivated successfully.');

        return new Response(json_encode(array('type' => 'success', 'reload' => true)));
    }

    /**
     * Activate a Customer.
     *
     * @Route("/{id}/activate", name="customer_activate", defaults={"_format"="json"})
     * @Secure(roles="ROLE_CUSTOMER_READ")
     */
    public function activateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $customer = $em->getRepository('TitanCustomerBundle:Customer')->find($id);

        if (!$customer) {
            throw $this->createNotFoundException('Unable to find Customer entity.');
        }

        $helper = $this->get('titan.customer.helper.customer');
        $helper->activateCustomer($customer);
        $em->persist($customer);
        $em->flush();

        $this->get('session')->getFlashBag()->add('success', 'Customer activated successfully.');

        return new Response(json_encode(array('type' => 'success', 'reload' => true)));
    }
}
