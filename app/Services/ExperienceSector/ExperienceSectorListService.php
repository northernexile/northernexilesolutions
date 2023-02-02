<?php

namespace App\Services\ExperienceSector;

use App\Models\ExperienceSector;
use Illuminate\Database\Eloquent\Collection;

class ExperienceSectorListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','experience_id','sector_id']) :Collection
    {
        return ExperienceSector::get($columns);
    }
}
