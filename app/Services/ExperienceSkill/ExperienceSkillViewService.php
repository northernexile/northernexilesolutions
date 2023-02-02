<?php

namespace App\Services\ExperienceSkill;

use App\Models\ExperienceSkill;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ExperienceSkillViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return ExperienceSkill
     */
    public function get() :ExperienceSkill
    {
        return ExperienceSkill::findOrFail($this->identity);
    }
}
