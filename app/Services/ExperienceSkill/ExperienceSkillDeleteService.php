<?php

namespace App\Services\ExperienceSkill;

use App\Models\ExperienceSkill;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ExperienceSkillDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $experienceSkill = ExperienceSkill::findOrFail($this->identity);
        $experienceSkill->delete();
        return true;
    }
}
