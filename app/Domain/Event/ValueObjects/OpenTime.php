<?php

namespace App\Domain\Event\ValueObjects;

use App\Domain\Utilities\ValueObject\AbstractValueObject;
use Carbon\Carbon;

/**
 * 開催日時
 * Class OpenTime
 * @package App\Domain\Event\ValueObjects
 */
class OpenTime extends AbstractValueObject
{

    /**
     * 開催開始日時
     * @var Carbon $startDateTime
     */
    public $startDateTime;

    /**
     * 開催終了日時
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
        $this->setValidate('AfterNow', function() {
            return Carbon::today()->lt($this->startDateTime);
        });
    }
}