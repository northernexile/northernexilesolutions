<?php

namespace App\Http\Requests\Tag;

class TagUpdateRequest
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
