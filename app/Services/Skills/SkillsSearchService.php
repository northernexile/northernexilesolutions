<?php

namespace App\Services\Skills;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

class SkillsSearchService
{
    /**
     * @var string
     */
    protected string $term;

    /**
     * @param string $term
     * @return $this
     */
    public function setTerm(string $term = '') :SkillsSearchService
    {
        $this->term = $term;
        return $this;
    }

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
