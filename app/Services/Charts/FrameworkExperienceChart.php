<?php

namespace App\Services\Charts;

use App\Models\Experience;
use App\Models\ExperienceSkill;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class FrameworkExperienceChart extends AbstractChartProvider
{
    const TYPE_FRAMEWORK = 2;
    /** @var string  */
    protected string $title = '';
    /** @var string  */
    protected string $color = ColorPalette::COLOR_RED;
    /** @var int|null  */
    protected ?int $type = FrameworkExperienceChart::TYPE_FRAMEWORK;

    /**
     * @return array
     */
    protected function getLabels() :array
    {
        return Skill::where(
            'skill_type_id',
            '=',
            $this->type
        )->pluck('name')
            ->toArray();
    }

    /**
     * @return Collection
     */
    protected function getDataSets() :Collection
    {
        /** @var \Illuminate\Database\Eloquent\Collection $relevantSkills */
        $relevantSkills = Skill::where('skill_type_id','=',FrameworkExperienceChart::TYPE_FRAMEWORK)
            ->get(['id','name']);
        $skillIdArray = $relevantSkills->pluck('id')->toArray();

        $experienceSkills = ExperienceSkill::whereIn('skill_id',$skillIdArray)
            ->join('skills','skills.id','=','experience_skills.skill_id')
            ->get(['skill_id','experience_id','name']);

        $frameworkDataSet = $this->getDataSet($relevantSkills);

        foreach ($experienceSkills as $experienceSkill){
            $frameworkData = $frameworkDataSet->getData();

            $this->addExperienceDuration($experienceSkill->experience_id);

            $currentValue = $frameworkData[$experienceSkill->name];
            $currentValue += $this->experiences[$experienceSkill->experience_id];
            $frameworkData[$experienceSkill->name] = $currentValue;
            $frameworkDataSet->setData($frameworkData);
        }

        return collect($frameworkDataSet);
    }
}
