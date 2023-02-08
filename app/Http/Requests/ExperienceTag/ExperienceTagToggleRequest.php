<?php

namespace App\Http\Requests\ExperienceTag;

use App\Http\Requests\AbstractFormRequest;

class ExperienceTagToggleRequest extends AbstractFormRequest
{
    public function rules(): array
    {
        return [
            'experience_id'=>'required|integer',
            'tag_id'=>'required|integer',
        ];
    }
}
