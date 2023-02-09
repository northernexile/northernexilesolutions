<?php

namespace App\Services\Charts;

class ChartFactory
{
    public function getChart() :Chart
    {
        return new Chart();
    }
}
