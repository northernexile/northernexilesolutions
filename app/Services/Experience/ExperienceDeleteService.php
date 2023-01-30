<?php

namespace App\Services\Experience;

use App\Models\Experience;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ExperienceDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $experience = Experience::findOrFail($this->identity);
        $experience->delete();
        return true;
    }
}
