<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\AbstractFormRequest;

class ProjectSearchRequest extends AbstractFormRequest
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
