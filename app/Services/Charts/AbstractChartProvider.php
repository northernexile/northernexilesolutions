<?php

namespace App\Services\Charts;

use App\Models\Experience;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractChartProvider
{
    /** @var ChartFactory  */
    protected ChartFactory $chartFactory;
    /** @var DataSetFactory  */
    protected DataSetFactory $dataSetFactory;
    /** @var array  */
    protected array $experiences = [];
    /** @var string  */
    protected string $title = '';

    protected ?int $type = null;

    /**
     * @param ChartFactory $chartFactory
     * @param DataSetFactory $dataSetFactory
     */
    public function __construct(
        ChartFactory $chartFactory,
        DataSetFactory $dataSetFactory
    ){
       $this->chartFactory = $chartFactory;
       $this->dataSetFactory = $dataSetFactory;
    }

    /**
     * @return ChartInterface
     */
    public function getChartData() :ChartInterface
    {
        $chart = $this->chartFactory->getChart();
        $chart->setLabels($this->getLabels())
            ->setDataSets($this->getDataSets());

        return $chart;
    }

    /**
     * @param Collection $experienceCollection
     * @return DataSet
     */
    protected function getDataSet(Collection $experienceCollection) :DataSet
    {
        $dataSet = $this->dataSetFactory->getDataSet();
        $dataSet->setLabel($this->title);
        $dataSet->setBackgroundColor(ColorPalette::getColor($this->color));
        $initialData = [];
        foreach ($experienceCollection as $experience){
            $initialData[$experience->name] = 0;
            $dataSet->setData($initialData);
        }

        return $dataSet;
    }

    /**
     * @param int $experienceId
     * @return void
     */
    protected function addExperienceDuration(int $experienceId) :void
    {
        if(!isset($this->experiences[$experienceId])){
            $experience = Experience::find($experienceId);
            $start = Carbon::parse($experience->start);
            $stop = Carbon::parse($experience->stop);
            $difference = $stop->diffInMonths($start);
            $this->experiences[$experienceId] = $difference;
        }
    }

    /**
     * @return array
     */
    abstract protected function getLabels() :array;

    /**
     * @return \Illuminate\Support\Collection
     */
    abstract protected function getDataSets() :\Illuminate\Support\Collection;
}
