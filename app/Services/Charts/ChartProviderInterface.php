<?php

namespace App\Services\Charts;

interface ChartProviderInterface
{
    public function getChartData() :ChartInterface;
}
