<?php

namespace App\Services\Skills;

use App\Models\Skill;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class SkillsDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $skill = Skill::findOrFail($this->identity);
        $skill->delete();
        return true;
    }
}
