<?php

namespace App\Http\Requests\ClientAddress;

use App\Http\Requests\AbstractFormRequest;

class ClientAddressUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'client_id'=>'required|integer',
            'address_id'=>'required|integer',
        ];
    }
}
