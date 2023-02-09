<?php

namespace App\Services\ExperienceSector;

use App\Models\ExperienceSector;
use Illuminate\Database\Eloquent\Collection;

class ExperienceSectorListService
{
    /**
     * @var int
     */
    private int $experienceId;

    /**
     * @param int $experienceId
     * @return $this
     */
    public function setExperienceId(int $experienceId) :ExperienceSectorListService
    {
        $this->experienceId = $experienceId;

        return $this;
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function getList(array $columns=['id','experience_id','sector_id']) :Collection
    {
        return ExperienceSector::where('experience_id','=',$this->experienceId)->get($columns);
    }
}
