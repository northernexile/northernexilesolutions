<?php

namespace App\Services\ExperienceSector;

use App\Models\ExperienceSector;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ExperienceSectorSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return ExperienceSector|null
     */
    public function getEntity(bool $create = true) :?ExperienceSector
    {
        if(!is_null($this->identity)){
            $result = ExperienceSector::findOrFail($this->identity);
        } else {
            $result = ($create) ? new ExperienceSector() : null;
        }

        return $result;
    }
}
