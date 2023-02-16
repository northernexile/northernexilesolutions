<?php

namespace App\Services\Client;

use App\Models\Client;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ClientSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Client|null
     */
    public function getEntity(bool $create = true) :?Client
    {
        if(!is_null($this->identity)){
            $result = Client::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Client() : null;
        }

        return $result;
    }
}
