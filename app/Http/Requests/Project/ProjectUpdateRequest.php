<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\AbstractFormRequest;

class ProjectUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'description'=>'required|string'
        ];
    }
}
