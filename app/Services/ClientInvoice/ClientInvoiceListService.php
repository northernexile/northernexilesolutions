<?php

namespace App\Services\ClientInvoice;

use App\Models\ClientInvoice;
use Illuminate\Database\Eloquent\Collection;

class ClientInvoiceListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text']) :Collection
    {
        return ClientInvoice::get($columns);
    }
}
