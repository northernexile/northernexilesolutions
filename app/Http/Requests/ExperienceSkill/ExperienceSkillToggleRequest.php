<?php

namespace App\Http\Requests\ExperienceSkill;

use App\Http\Requests\AbstractFormRequest;

class ExperienceSkillToggleRequest extends AbstractFormRequest
{
    public function rules(): array
    {
        return [
            'experience_id' => 'required|integer',
            'skill_id' => 'required|integer',
        ];
    }
}
