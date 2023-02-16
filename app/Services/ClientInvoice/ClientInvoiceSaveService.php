<?php

namespace App\Services\ClientInvoice;

use App\Models\ClientInvoice;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\PropertiesInterface;
use App\Services\Abstracts\SaveableTrait;

class ClientInvoiceSaveService extends AbstractSaveService implements IdentifiableInterface, PropertiesInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return ClientInvoice|null
     */
    public function getEntity(bool $create = true) :?ClientInvoice
    {
        if(!is_null($this->identity)){
            $result = ClientInvoice::findOrFail($this->identity);
        } else {
            $result = ($create) ? new ClientInvoice() : null;
        }

        return $result;
    }
}
