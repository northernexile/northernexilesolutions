<?php

namespace App\Services\ClientInvoice;

use App\Models\ClientInvoice;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ClientInvoiceDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $clientinvoice = ClientInvoice::findOrFail($this->identity);
        $clientinvoice->delete();
        return true;
    }
}
