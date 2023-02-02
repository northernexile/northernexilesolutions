<?php

namespace App\Http\Requests\ExperienceTag;

use App\Http\Requests\AbstractFormRequest;

class ExperienceTagDeleteRequest extends AbstractFormRequest
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
