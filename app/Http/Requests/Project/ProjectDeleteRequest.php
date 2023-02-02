<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\AbstractFormRequest;

class ProjectDeleteRequest extends AbstractFormRequest
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
