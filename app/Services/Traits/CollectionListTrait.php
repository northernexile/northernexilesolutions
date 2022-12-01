<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Collection;

trait CollectionListTrait
{
    /**
     * @param Collection $collection
     * @param array $columns
     * @param string $orderBy
     * @return Collection
     */
    public function getCollection(Collection $collection,array $columns = ['id','name'],string $orderBy = 'id') :\Illuminate\Support\Collection
    {
        return $collection->sortBy($orderBy)->only($columns);
    }
}
