<?php

namespace App\Http\Requests\Contact;

class ContactUpdateRequest
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
