<?php

namespace App\Http\Requests\Content;

use App\Http\Requests\AbstractFormRequest;

class ContentDeleteRequest extends AbstractFormRequest
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
