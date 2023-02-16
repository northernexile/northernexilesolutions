<?php

namespace App\Http\Requests\Address;

use App\Http\Requests\AbstractFormRequest;

class AddressUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'thoroughfare' => 'required|string',
            'address_line_1' => 'sometimes|string',
            'address_line_2' => 'sometimes|string',
            'address_line_3' => 'sometimes|string',
            'town' => 'sometimes|string',
            'county' => 'sometimes|string',
            'postcode' => 'sometimes|string',
        ];
    }
}
