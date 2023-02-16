<?php

namespace App\Services\ClientAddress;

use App\Models\ClientAddress;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\PropertiesInterface;
use App\Services\Abstracts\SaveableTrait;

class ClientAddressSaveService extends AbstractSaveService implements IdentifiableInterface, PropertiesInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return ClientAddress|null
     */
    public function getEntity(bool $create = true) :?ClientAddress
    {
        if(!is_null($this->identity)){
            $result = ClientAddress::findOrFail($this->identity);
        } else {
            $result = ($create) ? new ClientAddress() : null;
        }

        return $result;
    }
}
