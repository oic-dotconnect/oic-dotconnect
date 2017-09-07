<?php

namespace Tests\ValueObjects\Student;

use App\Domain\Event\ValueObjects\WantedPeriod;
use Carbon\Carbon;
use Exception;
use TestCase;

class WantedPeriodTest extends TestCase
{
    public function test正常系()
    {
        $data = [
            'startDateTime' => new Carbon('2016-05-01 12:30:00'),
            'endDateTime' => new Carbon('2016-06-01 12:30:00'),
        ];

        new WantedPeriod($data);

        $this->assertTrue(true);
    }

    public function test異常系()
    {
        $data = [
            'startDateTime' => new Carbon('2016-05-01 12:30:00'),
            'endDateTime' => new Carbon('2016-04-01 12:30:00'),
        ];

        try {
            new WantedPeriod($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }

        $data = [
            'startDateTime' => '2016-05-01 12:30:00',
            'endDateTime' => new Carbon('2016-06-01 12:30:00'),
        ];
        try {
            new WantedPeriod($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }
    }
}