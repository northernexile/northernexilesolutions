<?php

namespace App\Http\Requests\Experience;

use App\Http\Requests\AbstractFormRequest;

class ExperienceCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'company' => 'required|string',
            'title'=>'required|string',
            'description'=>'required|string',
            'start'=>'required|date',
            'stop'=>'sometimes|date',
        ];
    }
}
