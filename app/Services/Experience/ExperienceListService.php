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
    public function getList(array $columns=['id','company','title','description','start','stop']) :Collection
    {
        return Experience::orderBy('start','asc')->get($columns);
    }
}
