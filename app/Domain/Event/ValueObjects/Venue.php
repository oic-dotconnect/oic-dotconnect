<?php

namespace App\Domain\Event\ValueObjects;

use App\Domain\Utilities\ValueObject\AbstractValueObject;

/**
 * 開催場所
 * Class Venue
 * @package App\Domain\Event\ValueObjects
 */
class Venue extends AbstractValueObject
{
    /**
     * 開催場所名
     * @var string $venue
     */
    public $venue;

    public function setUpValidate()
    {

    }
}