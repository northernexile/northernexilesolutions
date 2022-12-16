<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\AbstractFormRequest;

class TagDeleteRequest extends AbstractFormRequest
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
