<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\AbstractFormRequest;
use App\Http\Requests\ApiFormRequestInterface;

class ProjectViewRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules() :array
    {
        return [
            'id'=>'integer|required'
        ];
    }
}
