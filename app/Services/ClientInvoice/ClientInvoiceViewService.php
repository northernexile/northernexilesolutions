<?php

namespace App\Services\ClientInvoice;

use App\Models\ClientInvoice;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ClientInvoiceViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return ClientInvoice
     */
    public function get() :ClientInvoice
    {
        return ClientInvoice::findOrFail($this->identity);
    }
}
