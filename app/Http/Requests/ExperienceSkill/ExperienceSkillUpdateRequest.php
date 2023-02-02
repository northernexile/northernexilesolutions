<?php

namespace App\Http\Requests\ExperienceSkill;

use App\Http\Requests\AbstractFormRequest;

class ExperienceSkillUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'experience_id' => 'required|integer',
            'skill_id' => 'required|integer',
        ];
    }
}
