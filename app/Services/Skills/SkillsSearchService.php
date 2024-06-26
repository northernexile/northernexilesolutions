<?php

namespace App\Services\Skills;

use App\Models\Skill;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class SkillsSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search() :Collection
    {
        return Skill::where(function ($query){
            return $query->where('name','like',implode(['%',$this->term,'%']))
                ->orWhere('id','=',$this->term);
        })->get();
    }
}
