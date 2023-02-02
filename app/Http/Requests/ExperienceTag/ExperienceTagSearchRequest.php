<?php

namespace App\Http\Requests\ExperienceTag;

use App\Http\Requests\AbstractFormRequest;

class ExperienceTagSearchRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'term'=>'required'
        ];
    }
}
