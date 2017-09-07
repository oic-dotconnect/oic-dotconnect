<?php

use App\Domain\Event\ValueObjects\ParticipantInfo;
use App\Domain\Student\Student;

class ParticipantInfoTest extends TestCase
{
    public function test正常系()
    {
        $data = [
            'capacity' => 30,
            'entryList' => collect([
                new Student(),
                new Student(),
                new Student(),
            ])
        ];

        new ParticipantInfo($data);

        $this->assertTrue(true);
    }

    public function test異常系()
    {
        $data = [
            'capacity' => 201,
            'entryList' => collect([
                new Student(),
                new Student(),
                new Student(),
            ])
        ];

        try {
            new ParticipantInfo($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }

        $data = [
            'capacity' => 11,
            'entryList' => collect([
                new Student(),
                new Student(),
                'hoge',
            ])
        ];

        try {
            new ParticipantInfo($data);
            $this->fail('例外発生なし');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }

    }
}