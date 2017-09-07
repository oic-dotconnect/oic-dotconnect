<?php

namespace App\Domain\Utilities\Entity;

use App\Domain\Utilities\Identifier\IdentifierInterface;

abstract class AbstractEntity implements EntityInterface
{
    use EntityAttributeAccessible;

    protected $identifierKeys;

    protected function getIdentifierData():array
    {
        $data = [];
        foreach ($this->identifierKeys as $identifierKey) {
            $data[$identifierKey] = $this->{$identifierKey};
        }
        return $data;
    }

    public function toArray():array
    {
        return $this->scope->toArray();
    }

    public function _equal(IdentifierInterface $id):bool
    {
        $myId = $this->getIdentifier();
        if(get_class($myId) !== get_class($id)) {
            throw new \Exception('comparing different id');
        }
        $myIdData = $myId->toArray();
        $idData = $id->toArray();

        return $myIdData == $idData;
    }
}