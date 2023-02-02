<?php

namespace App\Services\Skills;

use App\Models\Skill;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesInterface;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class SkillsCreateService implements IdentifiableInterface,PropertiesInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Skill|null
     */
    public function getEntity(bool $create = true) :?Skill
    {
        if(!is_null($this->identity)){
            $result = Skill::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Skill() : null;
        }

        return $result;
    }
}
