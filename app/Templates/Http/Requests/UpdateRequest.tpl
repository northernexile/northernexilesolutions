<?php

namespace App\Http\Requests\[ModuleSingular];

use App\Http\Requests\AbstractFormRequest;

class [ModuleSingular]UpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            [Columns]
        ];
    }
}
