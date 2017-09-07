<?php

namespace App\Domain\Event\ValueObjects;

use App\Domain\Student\Student;
use App\Domain\Utilities\ValueObject\AbstractValueObject;
use Illuminate\Support\Collection;

/**
 * 参加者情報
 * Class ParticipantsInfo
 * @package App\Domain\Event\ValueObjects
 */
class ParticipantInfo extends AbstractValueObject
{
    /**
     * 参加者の許容人数
     * @var int $capacity
     */
    public $capacity;

    /**
     * 参加者リスト
     * @var Collection $entryList
     */
    public $entryList;

    public function setUpValidate()
    {
        $this->rules = [
            'capacity' => ['integer', 'min:1', 'max:100']
        ];

        $this->setValidate('TypeCheck', function() {
           foreach ($this->entryList as $student) {
               if(!$student instanceof Student) return false;
           }
           return true;
        });
    }

    public function participantList(): Collection
    {
        return $this->entryList->take($this->capacity);
    }

    public function substituteList(): Collection
    {
        return $this->entryList->splice($this->capacity);
    }
}