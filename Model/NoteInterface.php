<?php

namespace Terramar\Bundle\CustomerBundle\Model;

use Terramar\Bundle\CustomerBundle\Model\Note\InteractionType;
use Orkestra\Bundle\ApplicationBundle\Model\UserInterface;

/**
 * A note
 */
interface NoteInterface extends PersistentModelInterface
{
    /**
     * @param string $body
     */
    public function setBody($body);

    /**
     * @return string
     */
    public function getBody();

    /**
     * @param \Terramar\Bundle\CustomerBundle\Model\Note\InteractionType $interactionType
     */
    public function setInteractionType($interactionType);

    /**
     * @return \Terramar\Bundle\CustomerBundle\Model\Note\InteractionType
     */
    public function getInteractionType();

    /**
     * @param string $summary
     */
    public function setSummary($summary);

    /**
     * @return string
     */
    public function getSummary();

    /**
     * @param \Orkestra\Bundle\ApplicationBundle\Model\UserInterface $createdBy
     */
    public function setCreatedBy(UserInterface $createdBy);

    /**
     * @return \Orkestra\Bundle\ApplicationBundle\Model\UserInterface
     */
    public function getCreatedBy();
}
