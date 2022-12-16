<?php

namespace App\Services\[ModuleSingular];

use App\Models\[ModuleSingular];
use Illuminate\Database\Eloquent\Collection;

class [ModuleSingular]ListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text']) :Collection
    {
        return [ModuleSingular]::get($columns);
    }
}
