<?php

namespace App\Http\Requests\Experience;

class ExperienceUpdateRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required'
        ];
    }
}
