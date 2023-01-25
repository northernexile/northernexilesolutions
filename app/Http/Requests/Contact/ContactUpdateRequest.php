<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\AbstractFormRequest;

class ContactUpdateRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'required'
        ];
    }
}
