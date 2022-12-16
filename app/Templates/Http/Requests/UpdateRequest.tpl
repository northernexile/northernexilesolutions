<?php

namespace App\Http\Requests\[ModuleSingular];

class [ModuleSingular]UpdateRequest
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
