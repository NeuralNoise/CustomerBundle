<?php

namespace Terramar\Bundle\CustomerBundle\Model;

use Orkestra\Bundle\ApplicationBundle\Model\UserInterface;
use Orkestra\Bundle\ApplicationBundle\Model\Contact\AddressInterface;

/**
 * A customer
 */
interface CustomerInterface extends PersistentModelInterface
{
    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address $billingAddress
     */
    public function setBillingAddress(AddressInterface $billingAddress);

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address
     */
    public function getBillingAddress();

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address $contactAddress
     */
    public function setContactAddress(AddressInterface $contactAddress);

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address
     */
    public function getContactAddress();

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress);

    /**
     * @return string
     */
    public function getEmailAddress();

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $lastName
     */
    public function setLastName($lastName);

    /**
     * @param boolean $emailVerified
     */
    public function setEmailVerified($emailVerified);

    /**
     * @return boolean
     */
    public function isEmailVerified();
    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param NoteInterface $note
     */
    public function addNote(NoteInterface $note);
    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes();

    /**
     * @param boolean $subscribed
     */
    public function setSubscribed($subscribed);

    /**
     * @return boolean
     */
    public function getSubscribed();

    /**
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus $status
     */
    public function setStatus($status);

    /**
     * @return \Terramar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus
     */
    public function getStatus();

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\User $createdBy
     */
    public function setCreatedBy(UserInterface $createdBy);

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\User
     */
    public function getCreatedBy();

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\User $modifiedBy
     */
    public function setModifiedBy(UserInterface $modifiedBy);

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\User
     */
    public function getModifiedBy();
}
