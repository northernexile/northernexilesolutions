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

    private function getFrameworkCollection(\Illuminate\Database\Eloquent\Collection $relevantSkills) :Collection
    {
        $frameworks = collect();
        foreach ($relevantSkills as $relevantSkill){
            $dataSet = $this->dataSetFactory->getDataSet();
            $dataSet->setLabel($relevantSkill->name);
            $dataSet->setData(0);
            $dataSet->setBackgroundColor(ColorPalette::getRandomColor());
            $frameworks->add($dataSet);
        }

        return $frameworks;
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

        $frameworks = $this->getFrameworkCollection($relevantSkills);

        foreach ($experienceSkills as $experienceSkill){
            /** @var DataSet $framework */
            $framework = $frameworks->filter(function ($framework) use ($experienceSkill){
                return $framework->getLabel() == $experienceSkill->name;
            })->first();

            $this->addExperienceDuration($experienceSkill);

            $currentValue = $framework->getData();
            $currentValue += $this->experiences[$experienceSkill->experience_id];
            $framework->setData($currentValue);
        }

        return $frameworks;
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
