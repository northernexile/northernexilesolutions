<?php

namespace App\Services\Content;

use App\Models\Content;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ContentDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $page = Content::findOrFail($this->identity);
        $page->delete();
        return true;
    }
}
