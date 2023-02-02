<?php

namespace App\Services\ExperienceTag;

use App\Models\ExperienceTag;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ExperienceTagSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return ExperienceTag|null
     */
    public function getEntity(bool $create = true) :?Content
    {
        if(!is_null($this->identity)){
            $result = ExperienceTag::findOrFail($this->identity);
        } else {
            $result = ($create) ? new ExperienceTag() : null;
        }

        return $result;
    }
}
