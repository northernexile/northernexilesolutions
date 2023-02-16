<?php

namespace App\Services\ClientInvoiceItem;

use App\Models\ClientInvoiceItem;
use Illuminate\Database\Eloquent\Collection;

class ClientInvoiceItemListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text']) :Collection
    {
        return ClientInvoiceItem::get($columns);
    }
}
