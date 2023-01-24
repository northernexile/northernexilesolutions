<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\AbstractFormRequest;

class ContactDeleteAllRequest extends AbstractFormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules();
    }
}
