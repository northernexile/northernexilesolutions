<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\AbstractFormRequest;

class ContactSearchRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'term'=>'required'
        ];
    }
}
