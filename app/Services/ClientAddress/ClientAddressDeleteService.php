<?php

namespace App\Services\ClientAddress;

use App\Models\ClientAddress;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ClientAddressDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $clientaddress = ClientAddress::findOrFail($this->identity);
        $clientaddress->delete();
        return true;
    }
}
