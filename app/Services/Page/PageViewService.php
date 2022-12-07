<?php

namespace App\Services\Page;

use App\Models\Page;
use App\Models\PageContent;
use App\Services\Abstracts\IdentifiableInterface;
use App\Services\Abstracts\IdentifiableTrait;

class PageViewService implements IdentifiableInterface
{
    use IdentifiableTrait;

    protected bool $withContent = false;

    /**
     * @param bool $withContent
     * @return $this
     */
    public function setWithContent(bool $withContent = false) :PageViewService
    {
        $this->withContent = $withContent;
        return $this;
    }

    /**
     * @return Page
     */
    public function get() :Page
    {
        $page =  Page::findOrFail($this->identity);

        if($this->withContent){
            $page->content = PageContent::where('page_id','=',$this->identity)
                ->join('content','content.id','=','page_content.content_id')
                ->get([]);
        }

        return $page;
    }
}
