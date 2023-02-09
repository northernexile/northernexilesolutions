<?php

namespace App\Services\Charts;

class DataSetFactory
{
    public function getDataSet() :DataSet
    {
        return new DataSet();
    }
}
