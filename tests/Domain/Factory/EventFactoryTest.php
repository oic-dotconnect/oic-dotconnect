<?php

use App\Domain\Event\EventFactory;
use App\Domain\Student\Student;
use Carbon\Carbon;

class EventFactoryTest extends TestCase
{
    public function test正常系()
    {
        $builder = new EventFactory();
        $event = $builder->setEventCode('abcdefg')
            ->setTitle('テストイベント')
            ->setField('it')
            ->setStatus('open')
            ->setVenue('5A')
            ->setCapacity(10)
            ->setOpenTime(Carbon::now(), Carbon::tomorrow())
            ->setWantedPeriod(Carbon::now(), Carbon::tomorrow())
            ->setOrganizer(new Student([
                'studentCode' => 's0001'
            ]))
            ->build();

        $this->assertTrue(true);
    }
}