<?php

namespace App\Http\Requests\ExperienceSkill;

use App\Http\Requests\AbstractFormRequest;

class ExperienceSkillCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'experience_id' => 'required|integer',
          'skill_id' => 'required|integer',
        ];
    }
}
