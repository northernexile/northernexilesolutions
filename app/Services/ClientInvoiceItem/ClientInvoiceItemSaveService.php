<?php

namespace App\Services\ClientInvoiceItem;

use App\Models\ClientInvoiceItem;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\PropertiesInterface;
use App\Services\Abstracts\SaveableTrait;

class ClientInvoiceItemSaveService extends AbstractSaveService implements IdentifiableInterface, PropertiesInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return ClientInvoiceItem|null
     */
    public function getEntity(bool $create = true) :?ClientInvoiceItem
    {
        if(!is_null($this->identity)){
            $result = ClientInvoiceItem::findOrFail($this->identity);
        } else {
            $result = ($create) ? new ClientInvoiceItem() : null;
        }

        return $result;
    }
}
