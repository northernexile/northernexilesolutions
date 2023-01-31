<?php

namespace App\Services\Experience;

use App\Models\Experience;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesInterface;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ExperienceSaveService extends AbstractSaveService implements IdentifiableInterface,PropertiesInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Experience|null
     */
    public function getEntity(bool $create = true) :?Experience
    {
        if(!is_null($this->identity)){
            $result = Experience::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Experience() : null;
        }

        return $result;
    }
}
