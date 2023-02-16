<?php

namespace App\Http\Requests\Address;

use App\Http\Requests\AbstractFormRequest;

class AddressSearchRequest extends AbstractFormRequest
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
