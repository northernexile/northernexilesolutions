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
     * @param TechnologyExperienceChart $technologyExperienceChart
     */
    public function __construct(
        FrameworkExperienceChart $frameworkExperienceChart,
        SectorExperienceChart $sectorExperienceChart,
        TechnologyExperienceChart $technologyExperienceChart
    ){
        $this->charts['framework'] = $frameworkExperienceChart;
        $this->charts['sector'] = $sectorExperienceChart;
        $this->charts['technology'] = $technologyExperienceChart;
    }

    /**
     * @return Collection|ChartProviderInterface[]
     */
    public function getChartCollection():Collection
    {
        return collect($this->charts);
    }
}
