<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\AbstractFormRequest;
use App\Http\Requests\ApiFormRequestInterface;

class TagViewRequest extends AbstractFormRequest
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
