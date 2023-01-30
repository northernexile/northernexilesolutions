<?php

namespace App\Services\Experience;

use App\Models\Experience;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ExperienceViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Experience
     */
    public function get() :Experience
    {
        return Experience::findOrFail($this->identity);
    }
}
