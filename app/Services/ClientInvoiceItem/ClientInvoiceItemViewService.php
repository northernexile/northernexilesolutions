<?php

namespace App\Services\ClientInvoiceItem;

use App\Models\ClientInvoiceItem;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ClientInvoiceItemViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return ClientInvoiceItem
     */
    public function get() :ClientInvoiceItem
    {
        return ClientInvoiceItem::findOrFail($this->identity);
    }
}
