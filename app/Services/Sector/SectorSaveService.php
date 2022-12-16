<?php

namespace App\Services\Sector;

use App\Models\Sector;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class SectorSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Sector|null
     */
    public function getEntity(bool $create = true) :?Sector
    {
        if(!is_null($this->identity)){
            $result = Sector::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Sector() : null;
        }

        return $result;
    }
}
