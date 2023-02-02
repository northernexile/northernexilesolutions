<?php

namespace App\Services\Skills;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

class SkillsListService
{
    /**
     * @param array $columns
     * @param string $orderBy
     * @return Collection
     */
    public function getList(array $columns = ['id','name','icon','skill_type_id'],string $orderBy = 'id') :Collection
    {
        return Skill::orderBy($orderBy)->get($columns);
    }
}
