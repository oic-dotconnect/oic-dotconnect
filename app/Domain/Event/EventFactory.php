<?php

namespace App\Domain\Event;

use App\Domain\Event\ValueObjects\OpenTime;
use App\Domain\Event\ValueObjects\ParticipantInfo;
use App\Domain\Event\ValueObjects\Venue;
use App\Domain\Event\ValueObjects\WantedPeriod;
use App\Domain\Student\Student;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class EventFactory
{
    private $wantedPeriod;
    private $openTime;
    private $venue;
    private $capacity;
    private $entryList;
    private $tagList;
    private $status;
    private $field;
    private $organizerId;
    private $title;
    private $eventCode;
    private $participantInfo;

    function __construct()
    {
        $this->entryList = new Collection();
        $this->tagList = new Collection();
    }

    public function build(): Event
    {
        $this->participantInfo = new ParticipantInfo([
            'capacity' => $this->capacity,
            'entryList' => $this->entryList
        ]);

        $data = [];
        foreach ($this as $key => $value) {
            $data[$key] = $value;
        }

        $errors = [];
        foreach ($data as $key => $value) {
            if(is_null($value)) $errors[] = $key;
        }
        if(count($errors) > 0) throw new \Exception(implode(',', $errors).'をセットしてください。');

        return new Event($data);
    }

    public function setEventCode(string $eventCode): EventFactory
    {
        $this->eventCode = $eventCode;
        return $this;
    }

    public function setWantedPeriod(Carbon $startDateTime, Carbon $endDateTime): EventFactory
    {
        $this->wantedPeriod = new WantedPeriod([
            'startDateTime' => $startDateTime,
            'endDateTime' => $endDateTime,
        ]);
        return $this;
    }

    public function setOpenTime(Carbon $startDateTime, Carbon $endDateTime): EventFactory
    {
        $this->openTime = new OpenTime([
            'startDateTime' => $startDateTime,
            'endDateTime' => $endDateTime,
        ]);
        return $this;
    }

    public function setVenue(string $venue): EventFactory
    {
        $this->venue = new Venue([
           'venue' => $venue
        ]);
        return $this;
    }

    public function setCapacity(int $capacity): EventFactory
    {
        $this->capacity = $capacity;
        return $this;
    }

    public function setEntryList(Collection $entryList): EventFactory
    {
        $this->entryList = $entryList;
        return $this;
    }

    public function setStatus(string $status): EventFactory
    {
        $this->status = $status;
        return $this;
    }

    public function setField(string $field): EventFactory
    {
        $this->field = $field;
        return $this;
    }

    public function setOrganizer(Student $organizer): EventFactory
    {
        $id = $organizer->getIdentifier();
        $this->organizerId = $id->studentCode;
        return $this;
    }

    public function setTitle(string $title): EventFactory
    {
        $this->title = $title;
        return $this;
    }
}