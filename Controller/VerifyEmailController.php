<?php

namespace TerraMar\Bundle\CustomerBundle\Controller;

use Orkestra\Bundle\ApplicationBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Handles marking a customer's email as verified
 *
 * @Route("/verify-email")
 */
class VerifyEmailController extends Controller
{
    /**
     * @Route("/{id}/{hash}", name="customer_verify_email")
     * @Template
     */
    public function verifyAction($id, $hash)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var \TerraMar\Bundle\CustomerBundle\Entity\Customer $customer */
        $customer = $em->getRepository('TerraMarCustomerBundle:Customer')->find($id);

        if (!$customer || $customer->getEmailVerified()) {
            throw $this->createNotFoundException('Unable to locate Customer entity');
        }

        $helper = $this->get('terramar.customer.helper.email_verification');

        $verifyHash = $helper->getEmailVerificationHash($customer);

        if ($hash === $verifyHash) {
            $customer->setEmailVerified(true);
            $em->persist($customer);
            $em->flush();
        } else {
            throw $this->createNotFoundException('Incorrect hash');
        }

        return array();
    }
}
