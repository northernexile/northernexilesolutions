<?php

namespace App\Services\ExperienceTag;

use App\Models\ExperienceTag;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ExperienceTagDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $tag = ExperienceTag::findOrFail($this->identity);
        $tag->delete();
        return true;
    }
}
