<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\AbstractFormRequest;

class TagUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'name'=>'required|string'
        ];
    }
}
