<?php

namespace App\Services\Sector;

use App\Models\Sector;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class SectorDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $page = Sector::findOrFail($this->identity);
        $page->delete();
        return true;
    }
}
