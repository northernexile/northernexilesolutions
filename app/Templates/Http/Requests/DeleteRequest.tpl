<?php

namespace App\Http\Requests\[ModuleSingular];

use App\Http\Requests\AbstractFormRequest;

class [ModuleSingular]DeleteRequest extends AbstractFormRequest
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
