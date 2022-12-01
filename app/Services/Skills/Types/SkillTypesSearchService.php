<?php

namespace App\Services\Skills\Types;

use App\Models\SkillType;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class SkillTypesSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search() :Collection
    {
        return SkillType::where(function ($query){
            return $query->where('name','like',implode(['%',$this->term,'%']))
                ->orWhere('id','=',$this->term);
        })->get();
    }
}
