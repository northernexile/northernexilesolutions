<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\AbstractFormRequest;

class TagCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'id'=>'integer|sometimes',
          'name'=>'string|required',
          'text'=>'string|required'
        ];
    }
}
