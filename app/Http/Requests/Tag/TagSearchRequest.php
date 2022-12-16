<?php

namespace App\Http\Requests\Content;

use App\Http\Requests\AbstractFormRequest;

class TagSearchRequest extends AbstractFormRequest
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
