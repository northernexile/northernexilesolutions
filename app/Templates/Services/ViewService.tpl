<?php

namespace App\Services\[ModuleSingular];

use App\Models\[ModuleSingular];
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class [ModuleSingular]ViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return [ModuleSingular]
     */
    public function get() :[ModuleSingular]
    {
        return [ModuleSingular]::findOrFail($this->identity);
    }
}
