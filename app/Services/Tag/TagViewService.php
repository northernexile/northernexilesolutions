<?php

namespace App\Services\Tag;

use App\Models\Tag;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class TagViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Tag
     */
    public function get() :Tag
    {
        return Tag::findOrFail($this->identity);
    }
}
