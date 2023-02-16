<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\AbstractFormRequest;

class ClientCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'name'=>'required|string',
          'email'=>'sometimes|email',
          'phone'=>'sometimes|string',
        ];
    }
}
