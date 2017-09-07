<?php

namespace App\Domain\Event\ValueObjects;

use App\Domain\Utilities\ValueObject\AbstractValueObject;
use Carbon\Carbon;

/**
 * 募集期間
 * Class WantedPeriod
 * @package App\Domain\Event\ValueObjects
 */
class WantedPeriod extends AbstractValueObject
{

    /**
     * 募集開始日時
     * @var Carbon $startDateTime
     */
    public $startDateTime;

    /**
     * 募集終了日時
     * @var Carbon $endDateTime
     */
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