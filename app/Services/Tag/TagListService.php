<?php

namespace App\Services\Tag;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','name','text']) :Collection
    {
        return Tag::get($columns);
    }
}
