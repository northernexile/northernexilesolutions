<?php

namespace App\Services\ExperienceSkill;

use App\Services\Abstracts\AbstractDeleteAllService;

final class ExperienceSkillDeleteAllService extends AbstractDeleteAllService
{
    /** @var string  */
    protected string $tableName = 'experience_skills';
}
