<?php

namespace App\Services\Sector;

use App\Models\Sector;
use Illuminate\Database\Eloquent\Collection;

class SectorListService
{
    /**
     * @param array $columns
     * @param string $orderBy
     * @return Collection
     */
    public function getList(array $columns = ['id','name','icon'],string $orderBy = 'id') :Collection
    {
        return Sector::orderBy($orderBy)->get($columns);
    }
}
