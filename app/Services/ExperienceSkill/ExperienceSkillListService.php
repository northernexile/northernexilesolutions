<?php

namespace App\Services\ExperienceSkill;

use App\Models\ExperienceSkill;
use Illuminate\Database\Eloquent\Collection;

class ExperienceSkillListService
{
    private int $experienceId;

    public function setExperienceId(int $experienceId) :ExperienceSkillListService
    {
        $this->experienceId = $experienceId;
        return $this;
    }
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','experience_id','skill_id']) :Collection
    {
        return ExperienceSkill::where('experience_id','=',$this->experienceId)
            ->get($columns);
    }
}
