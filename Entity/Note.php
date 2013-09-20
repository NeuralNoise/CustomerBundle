<?php

namespace Terramar\Bundle\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Orkestra\Bundle\ApplicationBundle\Model\UserInterface;
use Orkestra\Common\Entity\AbstractEntity;
use Terramar\Bundle\CustomerBundle\Model\Note\InteractionType;
use Terramar\Bundle\CustomerBundle\Model\NoteInterface;

/**
 * A customer
 *
 * @ORM\Entity
 * @ORM\Table(name="terramar_notes")
 */
class Note extends AbstractEntity implements NoteInterface
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
     * @var \Terramar\Bundle\CustomerBundle\Model\Note\InteractionType
     *
     * @ORM\Column(name="interaction_type", type="enum.terramar.customer.interaction_type")
     */
    protected $interactionType;

    /**
     * @var \Orkestra\Bundle\ApplicationBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Model\UserInterface")
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
     * @param \Terramar\Bundle\CustomerBundle\Model\Note\InteractionType $interactionType
     */
    public function setInteractionType($interactionType)
    {
        $this->interactionType = $interactionType;
    }

    /**
     * @return \Terramar\Bundle\CustomerBundle\Model\Note\InteractionType
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
     * @param \Orkestra\Bundle\ApplicationBundle\Model\UserInterface $createdBy
     */
    public function setCreatedBy(UserInterface $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Model\UserInterface
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
