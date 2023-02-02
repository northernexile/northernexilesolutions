<?php

namespace App\Services\ExperienceSector;

use App\Models\ExperienceSector;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ExperienceSectorDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $experienceSector = ExperienceSector::findOrFail($this->identity);
        $experienceSector->delete();
        return true;
    }
}
