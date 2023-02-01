<?php

namespace App\Services\Experience;

use App\Models\Experience;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class ExperienceSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return Experience::where(function ($query){
            return $query->where('id','=',$this->term)
                ->orWhere('company','like','%'.$this->term.'%');
        })->get();
    }
}
