<?php

namespace App\Services\Skills;

use App\Models\ExperienceSkill;

class SkillInUseService
{
    /** @var int  */
    private int $id;

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id) :SkillInUseService
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInUse() :bool
    {
        return boolval(ExperienceSkill::where('skill_id','=',$this->id)->count());
    }
}
