<?php

namespace Terramar\Bundle\CustomerBundle\Entity\Note;

use Orkestra\Common\Type\Enum;

class InteractionType extends Enum
{
    const OTHER = 'Other';

    const PHONE_CALL = 'Phone call';

    const EMAIL = 'Email';

    const IN_PERSON = 'In-person';

    const WRITTEN_NOTICE = 'Written notice';
}
