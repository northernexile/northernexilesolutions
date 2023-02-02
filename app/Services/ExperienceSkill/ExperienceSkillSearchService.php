<?php

namespace App\Services\ExperienceSkill;

use App\Models\ExperienceSkill;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class ExperienceSkillSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return ExperienceSkill::where(function ($query){
            return $query->where('id','=',$this->term);
        })->get();
    }
}
