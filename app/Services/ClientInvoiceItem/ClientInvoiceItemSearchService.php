<?php

namespace App\Services\ClientInvoiceItem;

use App\Models\ClientInvoiceItem;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class ClientInvoiceItemSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return ClientInvoiceItem::where(function ($query){
            return $query->where('id','=',$this->term)
                ->orWhere('name','like','%'.$this->term.'%');
        })->get();
    }
}
