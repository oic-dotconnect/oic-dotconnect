<?php

use App\Domain\Event\ValueObjects\OpenTime;
use Carbon\Carbon;

class OpenTimeTest extends TestCase
{
    public function test正常系()
    {
        $data = [
            'startDateTime' => Carbon::now(),
            'endDateTime' => Carbon::now()->addMonth(1),
        ];

        new OpenTime($data);

        $this->assertTrue(true);
    }

    public function test異常系()
    {
        $data = [
            'startDateTime' => Carbon::now(),
            'endDateTime' => Carbon::now()->subDay(1),
        ];

        try {
            new OpenTime($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }

        $data = [
            'startDateTime' => Carbon::now(),
            'endDateTime' => Carbon::now()->addMonth(1),
        ];

        try {
            new OpenTime($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }

        $data = [
            'startDateTime' => Carbon::now()->subDay(1),
            'endDateTime' => Carbon::now()->addMonth(1),
        ];

        try {
            new OpenTime($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }
    }
}