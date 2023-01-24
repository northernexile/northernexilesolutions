<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\AbstractFormRequest;

class ContactDeleteRequest extends AbstractFormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id'=>'integer|required'
        ];
    }
}
