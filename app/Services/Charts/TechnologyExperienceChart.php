<?php

namespace App\Services\Charts;

use App\Models\ExperienceSkill;
use App\Models\Skill;
use Illuminate\Support\Collection;

class TechnologyExperienceChart extends AbstractChartProvider implements ChartProviderInterface
{
    /** @var string  */
    protected string $color = ColorPalette::COLOR_INDIGO;
    /** @var string  */
    protected string $title = 'Technology experience in months';
    /**
     * @return array
     */
    protected function getLabels(): array
    {
        return Skill::pluck('name')->toArray();
    }

    /**
     * @return Collection
     */
    protected function getDataSets(): Collection
    {
        /** @var \Illuminate\Database\Eloquent\Collection $skills */
        $skills = Skill::get(['id','name']);

        $experienceSkills = ExperienceSkill::join('skills','skills.id','=','experience_skills.skill_id')
            ->get(['skill_id','experience_id','name']);

        $frameworkDataSet = $this->getDataSet($skills);

        foreach ($experienceSkills as $experienceSkill){
            $frameworkDataSet = $this->addExperienceValue(
                $frameworkDataSet,
                $experienceSkill->name,
                $experienceSkill->experience_id
            );
        }

        return collect($frameworkDataSet);
    }
}
