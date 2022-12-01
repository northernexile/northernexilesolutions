<?php

namespace App\Services\Skills\Types;

use App\Models\SkillType;
use Illuminate\Database\Eloquent\Collection;

class SkillTypesListService
{
    /**
     * @param array $columns
     * @param string $orderBy
     * @return Collection
     */
    public function getList(array $columns = ['id','name'],string $orderBy = 'id') :Collection
    {
        return SkillType::orderBy($orderBy)->get($columns);
    }
}
