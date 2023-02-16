<?php

namespace App\Services\ClientAddress;

use App\Models\ClientAddress;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ClientAddressViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return ClientAddress
     */
    public function get() :ClientAddress
    {
        return ClientAddress::findOrFail($this->identity);
    }
}
