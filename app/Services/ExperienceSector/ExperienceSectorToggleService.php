<?php

namespace App\Services\ExperienceSector;

use App\Models\Experience;
use App\Models\ExperienceSector;
use App\Models\Sector;

class ExperienceSectorToggleService
{
    private int $experienceId;

    private int $sectorId;

    /**
     * @param int $experienceId
     * @return ExperienceSectorToggleService
     */
    public function setExperienceId(int $experienceId): ExperienceSectorToggleService
    {
        $this->experienceId = $experienceId;
        return $this;
    }

    /**
     * @param int $sectorId
     * @return ExperienceSectorToggleService
     */
    public function setSectorId(int $sectorId): ExperienceSectorToggleService
    {
        $this->sectorId = $sectorId;
        return $this;
    }

    /**
     * @return ExperienceSector
     */
    public function toggle() :ExperienceSector
    {
        $experience = Experience::findOrFail($this->experienceId);
        $sector = Sector::findOrFail($this->sectorId);

        $experienceSector = ExperienceSector::where('experience_id','=',$experience->id)
            ->where('sector_id','=',$sector->id)
            ->first();

        if(!is_null($experienceSector)){
            $experienceSector->delete();
            return $experienceSector;
        }

        $experienceSector = new ExperienceSector();
        $experienceSector->experience_id = $experience->id;
        $experienceSector->sector_id = $sector->id;
        $experienceSector->save();

        return  $experienceSector;
    }
}
