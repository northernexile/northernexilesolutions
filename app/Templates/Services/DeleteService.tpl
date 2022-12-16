<?php

namespace App\Services\[ModuleSingular];

use App\Models\[ModuleSingular];
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class [ModuleSingular]DeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $[ModuleSingularLowercase] = [ModuleSingular]::findOrFail($this->identity);
        $[ModuleSingularLowercase]->delete();
        return true;
    }
}
