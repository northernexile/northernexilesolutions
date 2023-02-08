<?php

namespace App\Services\ExperienceTag;

use App\Models\ExperienceTag;
use Illuminate\Database\Eloquent\Collection;

class ExperienceTagListService
{
    private int $experienceId;

    public function setExperienceId(int $experienceId) :ExperienceTagListService
    {
        $this->experienceId = $experienceId;

        return $this;
    }
    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','experience_id','tag_id']) :Collection
    {
        return ExperienceTag::where('experience_id','=',$this->experienceId)->get($columns);
    }
}
