<?php

namespace App\Services\Sector;

use App\Models\ExperienceSector;

class SectorInUseService
{
    /** @var int  */
    private int $id;

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id) :SectorInUseService
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInUse() :bool
    {
        return boolval(ExperienceSector::where('sector_id','=',$this->id)->count());
    }

}
