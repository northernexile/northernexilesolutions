<?php

namespace App\Services\ExperienceSector;

use App\Models\ExperienceSector;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ExperienceSectorViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return ExperienceSector
     */
    public function get() :ExperienceSector
    {
        return ExperienceSector::findOrFail($this->identity);
    }
}
