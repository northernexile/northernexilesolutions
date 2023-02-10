<?php

namespace App\Services\Charts;

use App\Models\Experience;
use App\Models\ExperienceSkill;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class FrameworkExperienceChart
{
    const TYPE_FRAMEWORK = 2;

    /** @var ChartFactory  */
    private ChartFactory $chartFactory;
    /** @var DataSetFactory  */
    private DataSetFactory $dataSetFactory;

    private array $experiences = [];

    /**
     * @param ChartFactory $chartFactory
     * @param DataSetFactory $dataSetFactory
     */
    public function __construct(
        ChartFactory $chartFactory,
        DataSetFactory $dataSetFactory
    )
    {
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
     * @return array
     */
    private function getLabels() :array
    {
        return Skill::where(
            'skill_type_id',
            '=',
            FrameworkExperienceChart::TYPE_FRAMEWORK
        )->pluck('name')
            ->toArray();
    }

    private function getFrameworkDataSet(\Illuminate\Database\Eloquent\Collection $relevantSkills) :DataSet
    {
        $dataSet = $this->dataSetFactory->getDataSet();
        $dataSet->setLabel('Framework experience in months');
        $dataSet->setBackgroundColor(ColorPalette::getColor(ColorPalette::COLOR_RED));
        $initialData = [];
        foreach ($relevantSkills as $relevantSkill){
            $initialData[$relevantSkill->name] = 0;
            $dataSet->setData($initialData);
        }

        return $dataSet;
    }

    /**
     * @return Collection
     */
    private function getDataSets() :Collection
    {
        /** @var \Illuminate\Database\Eloquent\Collection $relevantSkills */
        $relevantSkills = Skill::where('skill_type_id','=',FrameworkExperienceChart::TYPE_FRAMEWORK)
            ->get(['id','name']);
        $skillIdArray = $relevantSkills->pluck('id')->toArray();

        $experienceSkills = ExperienceSkill::whereIn('skill_id',$skillIdArray)
            ->join('skills','skills.id','=','experience_skills.skill_id')
            ->get(['skill_id','experience_id','name']);

        $frameworkDataSet = $this->getFrameworkDataSet($relevantSkills);

        foreach ($experienceSkills as $experienceSkill){
            $frameworkData = $frameworkDataSet->getData();

            $this->addExperienceDuration($experienceSkill);

            $currentValue = $frameworkData[$experienceSkill->name];
            $currentValue += $this->experiences[$experienceSkill->experience_id];
            $frameworkData[$experienceSkill->name] = $currentValue;
            $frameworkDataSet->setData($frameworkData);
        }

        return collect($frameworkDataSet);
    }

    private function addExperienceDuration(ExperienceSkill $experienceSkill) :void
    {
        if(!isset($this->experiences[$experienceSkill->experience_id])){
            $experience = Experience::find($experienceSkill->experience_id);
            $start = Carbon::parse($experience->start);
            $stop = Carbon::parse($experience->stop);
            $difference = $stop->diffInMonths($start);
            $this->experiences[$experienceSkill->experience_id] = $difference;
        }
    }
}
