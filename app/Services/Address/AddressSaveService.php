<?php

namespace App\Services\Address;

use App\Models\Address;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\PropertiesInterface;
use App\Services\Abstracts\SaveableTrait;

class AddressSaveService extends AbstractSaveService implements IdentifiableInterface, PropertiesInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Address|null
     */
    public function getEntity(bool $create = true) :?Address
    {
        if(!is_null($this->identity)){
            $result = Address::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Address() : null;
        }

        return $result;
    }
}
