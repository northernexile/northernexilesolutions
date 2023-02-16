<?php

namespace App\Services\Client;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

class ClientListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','email','phone']) :Collection
    {
        return Client::get($columns);
    }
}
