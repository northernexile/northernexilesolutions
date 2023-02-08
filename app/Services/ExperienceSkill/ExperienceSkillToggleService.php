<?php

namespace App\Services\ExperienceSkill;

use App\Models\Experience;
use App\Models\ExperienceSkill;
use App\Models\Skill;

class ExperienceSkillToggleService
{
    private int $experienceId;

    private int $skillId;

    /**
     * @param int $experienceId
     * @return ExperienceSkillToggleService
     */
    public function setExperienceId(int $experienceId): ExperienceSkillToggleService
    {
        $this->experienceId = $experienceId;
        return $this;
    }

    /**
     * @param int $skillId
     * @return ExperienceSkillToggleService
     */
    public function setSkillId(int $skillId): ExperienceSkillToggleService
    {
        $this->skillId = $skillId;
        return $this;
    }

    /**
     * @return ExperienceSkill
     */
    public function toggle() :ExperienceSkill
    {
        $skill = Skill::findOrFail($this->skillId);
        $experience = Experience::findOrFail($this->experienceId);

        $experienceSkill = ExperienceSkill::where('experience_id','=',$experience->id)
            ->where('skill_id','=',$skill->id)
            ->first();

        if(!is_null($experienceSkill)){
            $experienceSkill->delete();
            return $experienceSkill;
        }

        $experienceSkill = new ExperienceSkill();
        $experienceSkill->skill_id = $skill->id;
        $experienceSkill->experience_id = $experience->id;
        $experienceSkill->save();

        return $experienceSkill;
    }
}
