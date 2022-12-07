<?php

namespace App\Services\Page;

use App\Models\Page;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class PageSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return Page::where(function ($query){
            return $query->where('id','=',$this->term)
                ->orWhere('name','like','%'.$this->term.'%')
                ->orWhere('slug','like','%'.$this->term.'%');
        })->get();
    }
}
