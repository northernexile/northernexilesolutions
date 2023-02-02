<?php

namespace App\Services\ExperienceSector;

use App\Models\ExperienceSector;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class ExperienceSectorSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return ExperienceSector::where(function ($query){
            return $query->where('id','=',$this->term);
        })->get();
    }
}
