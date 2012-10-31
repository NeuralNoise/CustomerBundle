<?php

namespace Titan\Bundle\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Titan\Bundle\CustomerBundle\Entity\Note\InteractionType;
use Orkestra\Bundle\ApplicationBundle\Entity\User;
use Orkestra\Common\Entity\EntityBase;

/**
 * A customer
 *
 * @ORM\Entity
 * @ORM\Table(name="titan_notes")
 */
class Note extends EntityBase
{
    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string")
     */
    protected $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    protected $body = '';

    /**
     * @var \Titan\Bundle\CustomerBundle\Entity\Note\InteractionType
     *
     * @ORM\Column(name="interaction_type", type="enum.titan.customer.interaction_type")
     */
    protected $interactionType;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->interactionType = new InteractionType(InteractionType::OTHER);
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = (string)$body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param \Titan\Bundle\CustomerBundle\Entity\Note\InteractionType $interactionType
     */
    public function setInteractionType($interactionType)
    {
        $this->interactionType = $interactionType;
    }

    /**
     * @return \Titan\Bundle\CustomerBundle\Entity\Note\InteractionType
     */
    public function getInteractionType()
    {
        return $this->interactionType;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
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
}
