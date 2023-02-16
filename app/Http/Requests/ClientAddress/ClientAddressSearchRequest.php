<?php

namespace App\Http\Requests\ClientAddress;

use App\Http\Requests\AbstractFormRequest;

class ClientAddressSearchRequest extends AbstractFormRequest
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
