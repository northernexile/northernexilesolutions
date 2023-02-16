<?php

namespace App\Services\Address;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

class AddressListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text']) :Collection
    {
        return Address::get($columns);
    }
}
