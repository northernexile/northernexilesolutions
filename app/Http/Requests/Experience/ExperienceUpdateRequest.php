<?php

namespace App\Http\Requests\Experience;

use App\Http\Requests\AbstractFormRequest;

class ExperienceUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'company'=>'required|string',
            'title'=>'required|string',
            'description'=>'required|string',
        ];
    }
}
