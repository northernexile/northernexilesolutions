<?php

namespace App\Services\Skills;

use App\Models\Skill;
use App\Services\Traits\CollectionListTrait;
use Illuminate\Support\Collection;

class SkillsListService
{
    use CollectionListTrait;

    /**
     * @param array $columns
     * @param string $orderBy
     * @return Collection
     */
    public function getList(array $columns = ['id','name'],string $orderBy = 'id') :Collection
    {
        return $this->getCollection(Skill::all(),$columns,$orderBy);
    }
}
