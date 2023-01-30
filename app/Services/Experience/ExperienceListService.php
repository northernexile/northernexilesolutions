<?php

namespace App\Services\Experience;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

class ExperienceListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text']) :Collection
    {
        return Experience::get($columns);
    }
}
