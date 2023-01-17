<?php

namespace App\Services\Service;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name']) :Collection
    {
        return Service::get($columns);
    }
}
