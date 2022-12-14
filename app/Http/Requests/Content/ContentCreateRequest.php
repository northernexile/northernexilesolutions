<?php

namespace App\Http\Requests\Content;

use App\Http\Requests\AbstractFormRequest;

class ContentCreateRequest extends AbstractFormRequest
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
