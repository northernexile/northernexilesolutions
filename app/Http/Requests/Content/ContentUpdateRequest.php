<?php

namespace App\Http\Requests\Content;

class ContentUpdateRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'=>'integer|required',
            'name'=>'string|required',
            'text'=>'string|required'
        ];
    }
}
