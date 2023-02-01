<?php

namespace App\Http\Requests\Experience;

use App\Http\Requests\AbstractFormRequest;

class ExperienceSearchRequest extends AbstractFormRequest
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
