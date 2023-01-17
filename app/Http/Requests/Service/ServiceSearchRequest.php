<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\AbstractFormRequest;

class ServiceSearchRequest extends AbstractFormRequest
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
