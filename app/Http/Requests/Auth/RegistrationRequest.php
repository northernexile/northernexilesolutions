<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\AbstractFormRequest;

class RegistrationRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name'  =>  'string|required',
            'email' =>  'email|required',
            'password'=> 'string|required'
        ];
    }
}
