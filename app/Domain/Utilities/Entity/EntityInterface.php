<?php

namespace App\Domain\Utilities\Entity;

use App\Domain\Utilities\Identifier\IdentifierInterface;

interface EntityInterface
{
    public function getIdentifier();

    public function _equal(IdentifierInterface $id):bool;

    public function toArray():array;
}
