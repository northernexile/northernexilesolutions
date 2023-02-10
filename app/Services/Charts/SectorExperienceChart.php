<?php

namespace App\Services\Charts;

use App\Models\ExperienceSector;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Collection;

class SectorExperienceChart extends AbstractChartProvider implements ChartProviderInterface
{
    /** @var string  */
    protected string $color = ColorPalette::COLOR_BLUE;
    /** @var string  */
    protected string $title = 'Sector experience in months';

    /**
     * @return array
     */
    protected function getLabels(): array
    {
        return Sector::pluck('name')->toArray();
    }

    protected function getDataSets(): \Illuminate\Support\Collection
    {
        /** @var Collection $relevantSectors */
        $relevantSectors = Sector::get(['id','name']);
        $sectorIdArray = $relevantSectors->pluck('id')->toArray();

        $experienceSectors = ExperienceSector::whereIn('sector_id',$sectorIdArray)
            ->join('sectors','sectors.id','=','experience_sectors.sector_id')
            ->get(['sector_id','experience_id','name']);

        $dataSet = $this->getDataSet($relevantSectors);

        foreach ($experienceSectors as $experienceSector){
            $dataSet = $this->addExperienceValue($dataSet,$experienceSector->name,$experienceSector->experience_id);
        }

        return collect($dataSet);
    }
}
