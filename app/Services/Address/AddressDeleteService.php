<?php

namespace App\Services\Address;

use App\Models\Address;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class AddressDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $address = Address::findOrFail($this->identity);
        $address->delete();
        return true;
    }
}
