<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\AbstractFormRequest;

class ContactCreateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
          'id' => 'sometimes',
          'name'=>'required|string',
          'email'=>'required|email',
          'text'=>'required|string'
        ];
    }
}
