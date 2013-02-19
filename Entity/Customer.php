<?php

namespace Terramar\Bundle\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Bundle\ApplicationBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Orkestra\Common\Entity\AbstractEntity;

/**
 * A customer
 *
 * @ORM\Entity
 * @ORM\Table(name="terramar_customers")
 */
class Customer extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string")
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string")
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    protected $emailAddress;

    /**
     * @var bool
     *
     * @ORM\Column(name="email_verified", type="boolean")
     */
    protected $emailVerified = false;

    /**
     * If true, the customer has subscribed to receive newsletters and other marketing material
     *
     * @var boolean
     *
     * @ORM\Column(name="subscribed", type="boolean")
     */
    protected $subscribed;

    /**
     * @var \Terramar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus
     *
     * @ORM\Column(name="status", type="enum.terramar.customer.customer_status")
     */
    protected $status;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\User")
     * @ORM\JoinColumn(name="created_by_id", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\User")
     * @ORM\JoinColumn(name="modified_by_id", referencedColumnName="id")
     */
    protected $modifiedBy;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address", cascade={"persist"})
     * @ORM\JoinColumn(name="contact_address_id", referencedColumnName="id")
     */
    protected $contactAddress;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address", cascade={"persist"})
     * @ORM\JoinColumn(name="billing_address_id", referencedColumnName="id")
     */
    protected $billingAddress;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Terramar\Bundle\CustomerBundle\Entity\Note", cascade={"persist"})
     * @ORM\JoinTable(name="terramar_customers_notes",
     *      joinColumns={@ORM\JoinColumn(name="customer_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="note_id", referencedColumnName="id", unique=true)}
     * )
     */
    protected $notes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->status = new Customer\CustomerStatus(Customer\CustomerStatus::ACTIVE);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address $billingAddress
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address $contactAddress
     */
    public function setContactAddress($contactAddress)
    {
        $this->contactAddress = $contactAddress;
    }

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address
     */
    public function getContactAddress()
    {
        return $this->contactAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        if ($emailAddress != $this->emailAddress) {
            $this->emailVerified = false;
        }

        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param boolean $emailVerified
     */
    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified ? true : false;
    }

    /**
     * @return boolean
     */
    public function getEmailVerified()
    {
        return $this->emailVerified;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @param Note $note
     */
    public function addNote(Note $note)
    {
        $this->notes->add($note);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param boolean $subscribed
     */
    public function setSubscribed($subscribed)
    {
        $this->subscribed = $subscribed;
    }

    /**
     * @return boolean
     */
    public function getSubscribed()
    {
        return $this->subscribed;
    }

    /**
     * @param \Terramar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \Terramar\Bundle\CustomerBundle\Entity\Customer\CustomerStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\User $createdBy
     */
    public function setCreatedBy(User $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\User $modifiedBy
     */
    public function setModifiedBy(User $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\User
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }
}
