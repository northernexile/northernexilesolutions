<?php

namespace App\Services\Service;

use App\Models\Service;
use App\Services\Abstracts\AbstractSaveService;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;
use App\Services\Abstracts\PropertiesTrait;
use App\Services\Abstracts\SaveableTrait;

class ServiceSaveService extends AbstractSaveService implements IdentifiableInterface
{
    use IdentifiableTrait;
    use PropertiesTrait;
    use SaveableTrait;

    /**
     * @param bool $create
     * @return Service|null
     */
    public function getEntity(bool $create = true) :?Content
    {
        if(!is_null($this->identity)){
            $result = Service::findOrFail($this->identity);
        } else {
            $result = ($create) ? new Service() : null;
        }

        return $result;
    }
}
