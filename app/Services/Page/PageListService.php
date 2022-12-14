<?php

namespace App\Services\Page;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

class PageListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','slug']) :Collection
    {
        return Page::get($columns);
    }
}
