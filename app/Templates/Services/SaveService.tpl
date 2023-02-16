<?php

namespace App\Services\[ModuleSingular];

use App\Models\[ModuleSingular];
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\PropertiesInterface;
use App\Services\Abstracts\SaveableTrait;

class [ModuleSingular]SaveService extends AbstractSaveService implements IdentifiableInterface, PropertiesInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return [ModuleSingular]|null
     */
    public function getEntity(bool $create = true) :?[ModuleSingular]
    {
        if(!is_null($this->identity)){
            $result = [ModuleSingular]::findOrFail($this->identity);
        } else {
            $result = ($create) ? new [ModuleSingular]() : null;
        }

        return $result;
    }
}
