<?php

namespace App\Services\ExperienceTag;

use App\Models\ExperienceTag;
use Illuminate\Database\Eloquent\Collection;

class ExperienceTagListService
{
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','experience_id','tag_id']) :Collection
    {
        return ExperienceTag::get($columns);
    }
}
