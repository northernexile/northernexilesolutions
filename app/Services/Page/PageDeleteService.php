<?php

namespace App\Services\Page;

use App\Models\Page;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class PageDeleteService implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @return bool
     */
    public function delete() :bool
    {
        $page = Page::findOrFail($this->identity);
        $page->delete();
        return true;
    }
}
