<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\AbstractFormRequest;

class ClientUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required',
            'name'=>'required|string',
            'email'=>'sometimes|email',
            'phone'=>'sometimes|string',
        ];
    }
}
