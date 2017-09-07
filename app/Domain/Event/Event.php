<?php

namespace App\Domain\Event;

use App\Domain\Event\ValueObjects\EventIdentifier;
use App\Domain\Utilities\Entity\AbstractEntity;

class Event extends AbstractEntity
{
    protected $attributes = [
        'eventCode',
        'title',
        'openTime',
        'participantInfo',
        'wantedPeriod',
        'venue',
        'organizerId',
        'status',
        'tagList',
        'field',
    ];

    protected $fillable = [
        'eventCode',
        'title',
        'openTime',
        'participantInfo',
        'wantedPeriod',
        'venue',
        'organizerId',
        'status',
        'tagList',
        'field',
    ];

    protected $identifierKeys = [
        'eventCode',
    ];

    public function getIdentifier(): EventIdentifier
    {
        $data = $this->getIdentifierData();
        return new EventIdentifier($data);
    }
}