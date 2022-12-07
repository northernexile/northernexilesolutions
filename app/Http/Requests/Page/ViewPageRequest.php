<?php

namespace App\Http\Requests\Page;

use App\Http\Requests\AbstractFormRequest;
use App\Http\Requests\ApiFormRequestInterface;

class ViewPageRequest extends AbstractFormRequest
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
