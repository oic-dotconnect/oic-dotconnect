<?php

namespace App\Domain\Student\ValueObjects;

use App\Domain\Utilities\Identifier\IdentifierInterface;
use App\Domain\Utilities\ValueObject\AbstractValueObject;

class StudentIdentifier extends AbstractValueObject implements IdentifierInterface
{
    public $studentCode;

    public function setUpValidate()
    {
    }
}