<?php

namespace App\Http\Requests\[ModuleSingular];

use App\Http\Requests\AbstractFormRequest;
use App\Http\Requests\ApiFormRequestInterface;

class [ModuleSingular]ViewRequest extends AbstractFormRequest
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
