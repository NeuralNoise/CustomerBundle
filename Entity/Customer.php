<?php

namespace Terramar\Bundle\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Common\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Orkestra\Bundle\ApplicationBundle\Model\Contact\AddressInterface;
use Orkestra\Bundle\ApplicationBundle\Model\UserInterface;
use Terramar\Bundle\CustomerBundle\Model\Customer\CustomerStatus;
use Terramar\Bundle\CustomerBundle\Model\CustomerInterface;
use Terramar\Bundle\CustomerBundle\Model\NoteInterface;

/**
 * A customer
 *
 * @ORM\Entity
 * @ORM\Table(name="terramar_customers")
 */
class Customer extends AbstractEntity implements CustomerInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string")
     */
    protected $companyName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string")
     */
    protected $firstName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string")
     */
    protected $lastName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    protected $emailAddress = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=true)
     */
    protected $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="ssn", type="string")
     */
    protected $ssn = '';

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
    protected $subscribed = false;

    /**
     * @var \Terramar\Bundle\CustomerBundle\Model\Customer\CustomerStatus
     *
     * @ORM\Column(name="status", type="enum.terramar.customer.customer_status")
     */
    protected $status;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Model\UserInterface")
     * @ORM\JoinColumn(name="created_by_id", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Model\UserInterface")
     * @ORM\JoinColumn(name="modified_by_id", referencedColumnName="id")
     */
    protected $modifiedBy;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Model\Contact\AddressInterface", cascade={"persist"})
     * @ORM\JoinColumn(name="contact_address_id", referencedColumnName="id")
     */
    protected $contactAddress;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\Contact\Address
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Model\Contact\AddressInterface", cascade={"persist"})
     * @ORM\JoinColumn(name="billing_address_id", referencedColumnName="id")
     */
    protected $billingAddress;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Terramar\Bundle\CustomerBundle\Model\NoteInterface", cascade={"persist"})
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
        $this->status = new CustomerStatus(CustomerStatus::ACTIVE);
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
    public function setBillingAddress(AddressInterface $billingAddress)
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
    public function setContactAddress(AddressInterface $contactAddress)
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

        $this->emailAddress = (string) $emailAddress;
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
        $this->firstName = (string) $firstName;
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
        $this->lastName = (string) $lastName;
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
    public function isEmailVerified()
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
    public function addNote(NoteInterface $note)
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
     * @param \Terramar\Bundle\CustomerBundle\MOdel\Customer\CustomerStatus $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \Terramar\Bundle\CustomerBundle\Model\Customer\CustomerStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\User $createdBy
     */
    public function setCreatedBy(UserInterface $createdBy)
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
    public function setModifiedBy(UserInterface $modifiedBy)
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

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param \DateTime $dateOfBirth
     */
    public function setDateOfBirth(\DateTime $dateOfBirth = null)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $ssn
     */
    public function setSsn($ssn)
    {
        $this->ssn = (string) $ssn;
    }

    /**
     * @return string
     */
    public function getSsn()
    {
        return $this->ssn;
    }
}
