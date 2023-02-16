<?php

namespace App\Services\Address;

use App\Models\Address;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class AddressViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Address
     */
    public function get() :Address
    {
        return Address::findOrFail($this->identity);
    }
}
