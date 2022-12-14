<?php

namespace App\Services\Content;

use App\Models\Content;
use Illuminate\Database\Eloquent\Collection;

class ContentListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text']) :Collection
    {
        return Content::get($columns);
    }
}
