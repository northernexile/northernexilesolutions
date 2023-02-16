<?php

namespace App\Services\Client;

use App\Models\Client;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ClientViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Client
     */
    public function get() :Client
    {
        return Client::findOrFail($this->identity);
    }
}
