<?php

namespace App\Services\ClientInvoiceItem;

use App\Models\ClientInvoiceItem;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ClientInvoiceItemDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $clientinvoiceitem = ClientInvoiceItem::findOrFail($this->identity);
        $clientinvoiceitem->delete();
        return true;
    }
}
