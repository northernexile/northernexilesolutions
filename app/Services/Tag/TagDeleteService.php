<?php

namespace App\Services\Tag;

use App\Models\Tag;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class TagDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $tag = Tag::findOrFail($this->identity);
        $tag->delete();
        return true;
    }
}
