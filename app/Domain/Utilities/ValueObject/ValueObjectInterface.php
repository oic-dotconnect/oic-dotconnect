<?php


namespace App\Domain\Utilities\ValueObject;

interface ValueObjectInterface
{
    public function toArray():array;
    public function setUpValidate();
}
