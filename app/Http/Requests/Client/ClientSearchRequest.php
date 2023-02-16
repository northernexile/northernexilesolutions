<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\AbstractFormRequest;

class ClientSearchRequest extends AbstractFormRequest
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
