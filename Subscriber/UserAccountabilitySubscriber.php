<?php

namespace Titan\Bundle\CustomerBundle\Subscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Orkestra\Bundle\ApplicationBundle\Entity\User;
use Titan\Bundle\CustomerBundle\Entity\Note;
use Titan\Bundle\CustomerBundle\Entity\Customer;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\Events;

class UserAccountabilitySubscriber implements EventSubscriber
{
    /**
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
     */
    protected $securityContext;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * Constructor
     *
     * We must inject the container because referencing the security context creates
     * a circular reference in the service container.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return \Symfony\Component\Security\Core\SecurityContext
     */
    private function getSecurityContext()
    {
        if (!$this->securityContext) {
            $this->securityContext = $this->container->get('security.context');
        }

        return $this->securityContext;
    }

    public function prePersist(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$entity instanceof Customer && !$entity instanceof Note) {
            return;
        }

        if ($entity->getCreatedBy()) {
            return;
        }

        if (!($token = $this->getSecurityContext()->getToken()) || !$token->getUser() instanceof User) {
            return;
        }

        $entity->setCreatedBy($token->getUser());
    }

    public function preUpdate(PreUpdateEventArgs $event)
    {
        $entity = $event->getEntity();

        if (!$entity instanceof Customer) {
            return;
        }

        if (!($token = $this->getSecurityContext()->getToken()) || !$token->getUser() instanceof User) {
            return;
        }

        $entity->setModifiedBy($token->getUser());

        // This "hack" is the only way to change a 'new' value in a preUpdate
        $em = $event->getEntityManager();
        $uow = $em->getUnitOfWork();
        $metadata = $em->getClassMetadata(get_class($entity));
        $uow->recomputeSingleEntityChangeSet($metadata, $entity);
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    function getSubscribedEvents()
    {
        return array(Events::prePersist, Events::preUpdate);
    }
}
