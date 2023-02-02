<?php

namespace App\Services\ExperienceTag;

use App\Models\ExperienceTag;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ExperienceTagViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return ExperienceTag
     */
    public function get() :ExperienceTag
    {
        return ExperienceTag::findOrFail($this->identity);
    }
}
