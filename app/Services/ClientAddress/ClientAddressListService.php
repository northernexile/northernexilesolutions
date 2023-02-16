<?php

namespace App\Services\ClientAddress;

use App\Models\ClientAddress;
use Illuminate\Database\Eloquent\Collection;

class ClientAddressListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text']) :Collection
    {
        return ClientAddress::get($columns);
    }
}
