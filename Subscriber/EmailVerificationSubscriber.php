<?php

namespace Titan\Bundle\CustomerBundle\Subscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Titan\Bundle\CustomerBundle\Entity\Customer;

class EmailVerificationSubscriber implements EventSubscriber
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @var bool
     */
    protected $loaded = false;

    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var \Symfony\Component\Templating\EngineInterface
     */
    protected $engine;

    /**
     * @var \Titan\Bundle\CustomerBundle\Helper\EmailVerificationHelperInterface
     */
    protected $helper;

    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    protected $router;

    /**
     * @var string
     */
    protected $sender;

    /**
     * Constructor
     * We must inject the container because referencing the dependencies creates
     * a circular reference in the service container.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function loadDependencies()
    {
        if ($this->loaded) {
            return;
        }

        $this->mailer = $this->container->get('mailer');
        $this->engine = $this->container->get('templating');
        $this->helper = $this->container->get('titan.customer.helper.email_verification');
        $this->router = $this->container->get('router');
        $this->sender = $this->container->getParameter('orkestra.system_email_address');
        $this->loaded = true;
    }


    public function postPersist(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$entity instanceof Customer) {
            return;
        }

        $this->sendEmailVerification($entity);
    }

    public function preUpdate(PreUpdateEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$entity instanceof Customer) {
            return;
        }

        if ($event->hasChangedField('emailAddress')) {
            $this->sendEmailVerification($entity);
        }
    }

    private function sendEmailVerification(Customer $customer)
    {
        $this->loadDependencies();

        $link = $this->router->generate('customer_verify_email', array('id' => $customer->getId(), 'hash' => $this->helper->getEmailVerificationHash($customer)), true);

        $body = $this->engine->render('TitanCustomerBundle:VerifyEmail:email_template.html.twig', array('customer' => $customer, 'link' => $link));

        $message = new \Swift_Message();
        $message->setSubject('Verify your email')
            ->setFrom($this->sender)
            ->setReplyTo($this->sender)
            ->setTo($customer->getEmailAddress())
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    function getSubscribedEvents()
    {
        return array(Events::postPersist, Events::preUpdate);
    }
}
