<?php

namespace App\Services\[ModuleSingular];

use App\Models\[ModuleSingular];
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class [ModuleSingular]SearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search(): Collection
    {
        return [ModuleSingular]::where(function ($query){
            return $query->where('id','=',$this->term)
                ->orWhere('name','like','%'.$this->term.'%');
        })->get();
    }
}
