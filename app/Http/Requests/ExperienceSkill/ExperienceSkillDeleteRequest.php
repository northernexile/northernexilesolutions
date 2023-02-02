<?php

namespace App\Http\Requests\ExperienceSkill;

use App\Http\Requests\AbstractFormRequest;

class ExperienceSkillDeleteRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'=>'integer|required'
        ];
    }
}
