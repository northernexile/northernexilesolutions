<?php

namespace App\Services\ExperienceSkill;

use App\Models\ExperienceSkill;
use Illuminate\Database\Eloquent\Collection;

class ExperienceSkillListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','experience_id','sector_id']) :Collection
    {
        return ExperienceSkill::get($columns);
    }
}
