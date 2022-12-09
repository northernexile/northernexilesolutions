<?php

namespace App\Services\Content;

use App\Models\Content;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class ContentViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Content
     */
    public function get() :Content
    {
        return Content::findOrFail($this->identity);
    }
}
