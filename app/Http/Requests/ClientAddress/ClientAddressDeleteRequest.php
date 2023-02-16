<?php

namespace App\Http\Requests\ClientAddress;

use App\Http\Requests\AbstractFormRequest;

class ClientAddressDeleteRequest extends AbstractFormRequest
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
