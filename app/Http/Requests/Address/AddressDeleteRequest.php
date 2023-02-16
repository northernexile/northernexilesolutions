<?php

namespace App\Http\Requests\Address;

use App\Http\Requests\AbstractFormRequest;

class AddressDeleteRequest extends AbstractFormRequest
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
