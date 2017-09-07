<?php

use App\Domain\Event\ValueObjects\WantedPeriod;
use Carbon\Carbon;

class WantedPeriodTest extends TestCase
{
    public function test正常系()
    {
        $data = [
            'startDateTime' => Carbon::now(),
            'endDateTime' => Carbon::now()->addMonth(1),
        ];

        new WantedPeriod($data);

        $this->assertTrue(true);
    }

    public function test異常系()
    {
        $data = [
            'startDateTime' => Carbon::now(),
            'endDateTime' => Carbon::now()->subDay(1),
        ];

        try {
            new WantedPeriod($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }

        $data = [
            'startDateTime' => Carbon::now(),
            'endDateTime' => Carbon::now()->addMonth(1),
        ];

        try {
            new WantedPeriod($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }

        $data = [
            'startDateTime' => Carbon::now()->subDay(1),
            'endDateTime' => Carbon::now()->addMonth(1),
        ];

        try {
            new WantedPeriod($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }
    }
}