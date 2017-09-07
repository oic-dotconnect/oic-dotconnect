<?php

namespace App\Domain\Event\ValueObjects;

use App\Domain\Utilities\ValueObject\AbstractValueObject;
use Carbon\Carbon;

class WantedPeriod extends AbstractValueObject
{
    /* @var Carbon $startDateTime */
    public $startDateTime;
    /* @var Carbon $endDateTime */
    public $endDateTime;

    public function setUpValidate()
    {
        $this->setValidate('TypeIsCarbon', function() {
            return $this->startDateTime instanceof Carbon && $this->endDateTime instanceof Carbon;
        });
        $this->setValidate('AfterDate', function() {
            return $this->startDateTime->lt($this->endDateTime);
        });
    }
}