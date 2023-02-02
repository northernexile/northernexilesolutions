<?php

namespace App\Services\ExperienceTag;

use App\Models\ExperienceTag;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class ExperienceTagSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return ExperienceTag::where(function ($query){
            return $query->where('id','=',$this->term);
        })->get();
    }
}
