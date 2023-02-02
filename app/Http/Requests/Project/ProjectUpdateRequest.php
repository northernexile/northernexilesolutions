<?php

namespace App\Http\Requests\Project;

class ProjectUpdateRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'experience_id'=>'required|integer',
            'description'=>'required|string'
        ];
    }
}
