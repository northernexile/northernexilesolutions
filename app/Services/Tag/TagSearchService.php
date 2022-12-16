<?php

namespace App\Services\Tag;

use App\Models\Tag;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class TagSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return Tag::where(function ($query){
            return $query->where('id','=',$this->term)
                ->orWhere('name','like','%'.$this->term.'%');
        })->get();
    }
}
