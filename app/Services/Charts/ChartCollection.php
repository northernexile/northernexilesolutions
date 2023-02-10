<?php

namespace App\Services\Charts;

use Illuminate\Support\Collection;

class ChartCollection
{
    /**
     * @var Collection
     */
    protected Collection $collection;

    /**
     * @var array
     */
    private array $charts = [];

    /**
     * @param FrameworkExperienceChart $frameworkExperienceChart
     * @param SectorExperienceChart $sectorExperienceChart
     */
    public function __construct(
        FrameworkExperienceChart $frameworkExperienceChart,
        SectorExperienceChart $sectorExperienceChart
    ){
        $this->charts[] = $frameworkExperienceChart;
        $this->charts[] = $sectorExperienceChart;
    }

    /**
     * @return Collection|ChartProviderInterface[]
     */
    public function getChartCollection():Collection
    {
        return collect($this->charts);
    }
}
