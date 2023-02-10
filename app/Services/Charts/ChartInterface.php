<?php

namespace App\Services\Charts;

use Illuminate\Support\Collection;

interface ChartInterface
{
    public function setLabels(array $labels = []) :ChartInterface;

    public function setDataSets(Collection $dataSets) :ChartInterface;

    public function getLabels() :array;

    public function getDataSets() :Collection;
}
