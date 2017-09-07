<?php

namespace App\Domain\Event\ValueObjects;

use App\Domain\Utilities\Identifier\IdentifierInterface;
use App\Domain\Utilities\ValueObject\AbstractValueObject;

class EventIdentifier extends AbstractValueObject implements IdentifierInterface
{
    public $eventCode;

    public function setUpValidate()
    {

    }
}