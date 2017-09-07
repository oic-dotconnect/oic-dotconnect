<?php

namespace App\Domain\Student;

use App\Domain\Student\ValueObjects\StudentIdentifier;
use App\Domain\Utilities\Entity\AbstractEntity;

class Student extends AbstractEntity
{
    protected $attributes = [
        'studentCode',
    ];

    protected $fillable = [
        'studentCode',
    ];

    protected $identifierKeys = [
        'studentCode',
    ];
    public function getIdentifier(): StudentIdentifier
    {
        $data = $this->getIdentifierData();
        return new StudentIdentifier($data);
    }
}