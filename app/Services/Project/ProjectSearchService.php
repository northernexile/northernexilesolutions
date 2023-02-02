<?php

namespace App\Services\Project;

use App\Models\Project;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class ProjectSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return Project::where(function ($query){
            return $query->where('id','=',$this->term)
                ->orWhere('name','like','%'.$this->term.'%');
        })->get();
    }
}
