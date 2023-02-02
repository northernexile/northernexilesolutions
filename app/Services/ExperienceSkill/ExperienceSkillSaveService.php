<?php

namespace App\Services\ExperienceSkill;

use App\Models\ExperienceSkill;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ExperienceSkillSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return ExperienceSkill|null
     */
    public function getEntity(bool $create = true) :?ExperienceSkill
    {
        if(!is_null($this->identity)){
            $result = ExperienceSkill::findOrFail($this->identity);
        } else {
            $result = ($create) ? new ExperienceSkill() : null;
        }

        return $result;
    }
}
