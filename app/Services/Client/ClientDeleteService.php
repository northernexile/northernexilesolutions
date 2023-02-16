<?php

namespace App\Services\Client;

use App\Models\Client;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ClientDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $client = Client::findOrFail($this->identity);
        $client->delete();
        return true;
    }
}
