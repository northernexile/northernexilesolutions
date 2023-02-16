<?php

namespace App\Http\Requests\ClientAddress;

use App\Http\Requests\AbstractFormRequest;

class ClientAddressCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'client_id' => 'required|integer',
          'address_id' => 'required|integer',
        ];
    }
}
