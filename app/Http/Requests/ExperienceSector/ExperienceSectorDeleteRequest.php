<?php

namespace App\Http\Requests\ExperienceSector;

use App\Http\Requests\AbstractFormRequest;

class ExperienceSectorDeleteRequest extends AbstractFormRequest
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
