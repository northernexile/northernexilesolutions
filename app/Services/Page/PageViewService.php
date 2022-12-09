<?php

namespace App\Services\Page;

use App\Models\Page;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class PageViewService implements IdentifiableInterface
{
    use IdentifiableTrait;
    /**
     * @return Page
     */
    public function get() :Page
    {
        $page =  Page::findOrFail($this->identity);

        return $page;
    }
}
