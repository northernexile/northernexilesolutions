<?php

namespace App\Http\Requests\Experience;

use App\Http\Requests\AbstractFormRequest;

class ExperienceDeleteRequest extends AbstractFormRequest
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
