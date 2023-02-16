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
            'id' => 'required|integer',
            'thoroughfare' => 'required|string',
            'address_line_1' => 'nullable|sometimes|string',
            'address_line_2' => 'nullable|sometimes|string',
            'address_line_3' => 'nullable|sometimes|string',
            'town' => 'nullable|sometimes|string',
            'county' => 'nullable|sometimes|string',
            'postcode' => 'nullable|sometimes|string',
        ];
    }
}
