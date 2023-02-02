<?php

namespace App\Http\Requests\ExperienceSector;

use App\Http\Requests\AbstractFormRequest;

class ExperienceSectorSearchRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'term'=>'required'
        ];
    }
}
