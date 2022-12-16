<?php

namespace App\Http\Requests\[ModuleSingular];

use App\Http\Requests\AbstractFormRequest;

class [ModuleSingular]CreateRequest extends AbstractFormRequest
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
