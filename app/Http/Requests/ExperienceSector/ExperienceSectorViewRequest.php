<?php

namespace App\Http\Requests\ExperienceSector;

use App\Http\Requests\AbstractFormRequest;
use App\Http\Requests\ApiFormRequestInterface;

class ExperienceSectorViewRequest extends AbstractFormRequest
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
