<?php

namespace App\Services\Sector;

use App\Models\Content;
use App\Models\Sector;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class SectorViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Sector
     */
    public function get() :Sector
    {
        return Sector::findOrFail($this->identity);
    }
}
