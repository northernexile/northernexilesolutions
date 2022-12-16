<?php

namespace App\Services\Sector;

use App\Models\Sector;
use App\Services\Abstracts\Search\AbstractSearchByTerm;
use Illuminate\Database\Eloquent\Collection;

class SectorSearchService extends AbstractSearchByTerm
{
    /**
     * @return Collection
     */
    public function search() :Collection
    {
        return Sector::where(function ($query){
            return $query->where('name','like',implode(['%',$this->term,'%']))
                ->orWhere('id','=',$this->term);
        })->get();
    }
}
